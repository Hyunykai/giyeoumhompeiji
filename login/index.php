<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8"> <!--메타 카세트 설정-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MUNIT에 로그인하고 다양한 유저와 소통해보세요.">
    <meta name="google-site-verification" content="gh1bhPxgj2RNQotVFufA6H4n5WFBLsa5aJwrE_ZYxWY" /> <!--구글 노출 설정-->
    <meta name="naver-site-verification" content="c70fbada5f85926fb6e8c32296b79e048663f0d5" /> <!--네이버 노출 설정-->
    <link rel="icon" type="image/png" href="https://munit.me/image/munit_papi.png">
    <meta property="og:title" content="MUNIT : 로그인하기">
    <meta property="og:description" content="MUNIT에 로그인하고 다양한 유저와 소통해보세요.">
    <meta property="og:image" content="https://munit.me/image/munitlogo.png">
    <title>munit - 로그인하기</title> <!--사이트 이름 설정-->
    <link rel="stylesheet" href="../css/style.css">
    <script type="module">
        import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js';
        import { getAuth, signInWithEmailAndPassword, GoogleAuthProvider, signInWithPopup } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';

        const firebaseConfig = {
            apiKey: "AIzaSyDTY21l_Q_1BbvU8DNU1CYsXbUdJk9hHEw",
            authDomain: "co-munit.firebaseapp.com",
            projectId: "co-munit",
            storageBucket: "co-munit.appspot.com",
            messagingSenderId: "960543617483",
            appId: "1:960543617483:web:e629fdb99b17dd2992c64e",
            measurementId: "G-G36BX3PG00"
        };
        
        const app = initializeApp(firebaseConfig);
        const auth = getAuth(app);
        
        document.addEventListener('DOMContentLoaded', () => {
            const loginBtn = document.getElementById('loginBtn');
            const googleLoginBtn = document.getElementById('googleLoginBtn');

            loginBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                signInWithEmailAndPassword(auth, email, password)
                    .then((userCredential) => {
                        console.log('Logged in:', userCredential.user);
                        window.location.href = '/'; 
                    })
                    .catch((error) => {
                        console.error('Login error:', error);
                    });
            });

            googleLoginBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const provider = new GoogleAuthProvider();
                signInWithPopup(auth, provider)
                    .then((result) => {
                        console.log('Google sign in:', result.user);
                        window.location.href = '/'; 
                    })
                    .catch((error) => {
                        console.error('Google sign in error:', error);
                    });
            });
        });
    </script>
</head>
<body>
<?php include '../headfoot/header.php'; ?>
    <h1 class="logtext">로그인</h1>
    <div>
        <form id="logform" novalidate>
            <div id="log-input">
                <div class="input-group">
                    <h3 class="logInfo">이메일 입력</h3>
                    <input type="email" id="email" name="email" placeholder="이메일 주소를 입력해주세요." required/>
                </div>
                <div class="input-group">
                    <h3 class="logInfo">비밀번호 입력</h3>
                    <input type="password" id="password" name="password" placeholder="비밀번호를 입력해주세요." required/>
                </div>
            </div>
            <div class="checkbox-group">
                <div class="logcheckbox">
                    <input type="checkbox" id="rememberMe" name="remember"/>
                    <label for="rememberMe">로그인 상태 유지</label>
                </div>
                <div class="logcheckbox">
                    <input type="checkbox" id="autoLogin" name="autoLogin"/>
                    <label for="autoLogin">자동 로그인</label>
                </div>
            </div>
            <div class="button-group">
                <button type="submit" id="loginBtn">MUNIT 아이디로 로그인</button>
                <button type="button" id="googleLoginBtn">Google로 로그인</button>
            </div>
            <div id="underbar">
                <div class="uncont">
                    <a href="/signin">
                        <p class="under">회원가입하기 ></p>
                    </a>
                    <a href="#">
                        <p class="under">비밀번호찾기 ></p>
                    </a>
                </div>
            </div>
        </form>        
    </div>
    <script src="https://munit.me/hf.js"></script>
</body>
</html>
