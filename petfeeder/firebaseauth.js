// firebaseauth.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-auth.js";

// Your Firebase config
const firebaseConfig = {
  apiKey: "AIzaSyDFWNE0kyIGJCZkepR0wex5yhlyi0lItMs",
  authDomain: "petfeeder-ae3c2.firebaseapp.com",
  projectId: "petfeeder-ae3c2",
  storageBucket: "petfeeder-ae3c2.appspot.com",
  messagingSenderId: "YOUR_SENDER_ID",
  appId: "YOUR_APP_ID"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Show/hide sign in or sign up
document.getElementById("signUpButton").onclick = () => {
  document.getElementById("signIn").style.display = "none";
  document.getElementById("signup").style.display = "block";
};

document.getElementById("signInButton").onclick = () => {
  document.getElementById("signup").style.display = "none";
  document.getElementById("signIn").style.display = "block";
};

// Handle Sign Up
document.getElementById("submitSignUp").onclick = async (e) => {
  e.preventDefault();
  const email = document.getElementById("rEmail").value;
  const password = document.getElementById("rPassword").value;

  try {
    await createUserWithEmailAndPassword(auth, email, password);
    document.getElementById("signUpMessage").style.display = "block";
    document.getElementById("signUpMessage").innerText = "Registration successful! Please log in.";
    document.getElementById("signup").style.display = "none";
    document.getElementById("signIn").style.display = "block";
  } catch (error) {
    document.getElementById("signUpMessage").style.display = "block";
    document.getElementById("signUpMessage").innerText = error.message;
  }
};

// Handle Sign In
document.getElementById("submitSignIn").onclick = async (e) => {
  e.preventDefault();
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  try {
    await signInWithEmailAndPassword(auth, email, password);
    window.location.href = "index.html"; // Redirect to your home page
  } catch (error) {
    document.getElementById("signInMessage").style.display = "block";
    document.getElementById("signInMessage").innerText = error.message;
  }
};
