<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8"> <!--메타 카세트 설정-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MUNIT과 함께 더 즐거운 커뮤니케이션의 세상으로!">
    <meta name="google-site-verification" content="gh1bhPxgj2RNQotVFufA6H4n5WFBLsa5aJwrE_ZYxWY" /> <!--구글 노출 설정-->
    <meta name="naver-site-verification" content="c70fbada5f85926fb6e8c32296b79e048663f0d5" /> <!--네이버 노출 설정-->
    <link rel="icon" type="image/png" href="https://munit.me/image/munit_papi.png">
    <meta property="og:title" content="MUNIT : 회원가입하기">
    <meta property="og:description" content="MUNIT과 함께 더 즐거운 커뮤니케이션의 세상으로!">
    <meta property="og:image" content="https://munit.me/image/munitlogo.png">
    <title>munit - 회원가입하기</title> <!--사이트 이름 설정-->
    <link rel="stylesheet" href="../css/style.css">
    <script type="module">
        import { 
          initializeApp 
        } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js';
        import { 
          getAuth, 
          createUserWithEmailAndPassword, 
          sendEmailVerification, 
          GoogleAuthProvider, 
          signInWithPopup 
        } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js';

        const firebaseConfig = {
            apiKey: "AIzaSyDTY21l_Q_1BbvU8DNU1CYsXbUdJk9hHEw",
            authDomain: "co-munit.firebaseapp.com",
            projectId: "co-munit",
            storageBucket: "co-munit.appspot.com",
            messagingSenderId: "960543617483",
            appId: "1:960543617483:web:e629fdb99b17dd2992c64e",
            measurementId: "G-G36BX3PG00"
        };

        // Firebase 앱 초기화
        const app = initializeApp(firebaseConfig);
        const auth = getAuth(app);

        document.addEventListener('DOMContentLoaded', () => {
    const nextStepBtn1 = document.getElementById('nextStepBtn1');
    const nextStepBtn2 = document.getElementById('nextStepBtn2');
    const agreeTerms = document.getElementById('agreeTerms');

    agreeTerms.addEventListener('change', () => {
        nextStepBtn1.disabled = !agreeTerms.checked;
    });

    nextStepBtn1.addEventListener('click', () => showStep(2));
    nextStepBtn2.addEventListener('click', () => showStep(3));
    document.getElementById('completeRegistrationBtn').addEventListener('click', completeRegistration);

    function showStep(stepNumber) {
        document.querySelectorAll('.step').forEach(step => {
            step.style.display = 'none';
        });
        document.getElementById(`step${stepNumber}`).style.display = 'block';
    }

    async function completeRegistration() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        try {
            const userCredential = await createUserWithEmailAndPassword(auth, email, password);
            await sendEmailVerification(userCredential.user);
            alert("인증 메일을 보냈습니다. 이메일을 확인해주세요.");
            showStep(4);
        } catch (error) {
            console.error("Registration Error:", error);
            alert(error.message);
        }
    }
});


        async function signInWithGoogle() {
            const provider = new GoogleAuthProvider();
            try {
                const result = await signInWithPopup(auth, provider);
                // 구글 계정으로 로그인 성공
                console.log(result.user);
                showStep(3); // 완료 페이지로 바로 전환
            } catch (error) {
                console.error("Google Sign-In Error:", error);
                alert(error.message);
            }
        }
    </script>
    <style>
        .step { display: none; }
        #step1 { display: block; }
    </style>
</head>
<body>
<?php include '../headfoot/header.php'; ?>
    <div id="step1" class="step">
        <h1 class="logtext">회원가입 약관 동의</h1>
        <div id="terms">
            <h2>서비스 이용 약관</h2>
            <textarea readonly style="width: 100%; height: 150px;">
    여기에 서비스 이용 약관 내용을 입력하세요...
            </textarea>
            <label>
                <input type="checkbox" id="agreeTerms">
                약관에 동의합니다.
            </label>
        </div>
        <button id="nextStepBtn1" disabled>Next Step</button>
    </div>
    
    <div id="step2" class="step">
        <h1 class="logtext">회원 정보 입력</h1>
        <input type="email" id="email" placeholder="이메일"><br>
        <input type="password" id="password" placeholder="비밀번호"><br>
        <button id="nextStepBtn2">Next Step</button>
    </div>
    
    <div id="step3" class="step">
        <h1 class="logtext">추가 정보 입력</h1>
        <input type="text" id="entryNickname" placeholder="엔트리 닉네임"><br>
        <button id="completeRegistrationBtn">Complete Registration</button>
    </div>
    
    <div id="step4" class="step">
        <h2>Registration Completed</h2>
        <p>회원가입이 완료되었습니다. 서비스를 이용해주세요.</p>
    </div>
    
    <script src="https://munit.me/hf.js"></script>
</body>
</html>


