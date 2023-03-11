
var provider = new firebase.auth.GoogleAuthProvider();

provider.addScope("https://www.googleapis.com/auth/calendar");

function googleSignin() {
   firebase.auth()
   
   .signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      //access token of google apis
      localStorage.setItem("auth_token",token);

      //var user = result.user;
      firebase.auth().currentUser.getIdToken(true).then(function(idToken) {
         //firebase id token
      localStorage.setItem("idToken",idToken);
      setCookie("user",token,1);
      alert("logged in");
      location.href="https://localhost/vfl";
}).catch(function(error) {
  // Handle error
});  
   
   }).catch(function(error) {
   
      var errorCode = error.code;
      var errorMessage = error.message;     
      console.log(error.code);
      console.log(error.message);

   });
}


function googleSignout() {
   localStorage.removeItem("idToken");
   localStorage.removeItem("auth_token");
   firebase.auth().signOut()
   .then(function() {
      console.log('Signout Succesfull');
   }, function(error) {
      console.log('Signout Failed');  
   });
}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}