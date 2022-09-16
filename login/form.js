const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const  btn = document.getElementById('btn')

// window.alert(hey)
// shor erroe  function
function showError(input,message){
    const formControl = input.parentElement;
    formControl.className = 'form_control error';
    const pop = formControl.querySelector('pop');
    pop.innerText = message
}
//show success
function showSuccess(input){
    formControl = input.parentElement;
    formControl.className = 'form_control success'
}

//check input lenght
function checkLenghtPassword(input,min,max){
    if(input.value.length < min){
        showError(input,'password must be at least 6 characters')

    }else if (input.value.length > max){
         showError(input,'must be less than 25 characters')
    } else{
        showSuccess(input);
    }
    
}
function checkLenghtUsername(input,mini,maxi){
    if(input.value.length < mini){
        showError(input,'username must be at least 3 characters')

    }else if (input.value.length > maxi){
         showError(input,'must be less than 30 characters')
    } else{
        showSuccess(input);
    }
    
}
function checkPasswordMatch(input1,input2){
    if(input1.value !== input2.value){
        showError(input2,'passwords do not match')
    }
}
//form email regex
// function isValidEmail(email){
//     const re = `/^(([^<>()[\]\\.,;:\s@"]+
//     (\.[^<>()[\]\\.,;:\s@"]+)*)|("
//     .+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]
//         {1,3}\.[0-9]{1,3}\])|(([a-zA-Z\
//             -0-9]+\.)+[a-zA-Z]{2,}))$/`
//             return re.test(email)
// }

//event listener
form.addEventListener('submit',function(e){
    e.preventDefault();

    if(username.value.trim() === ''){
        showError(username,'Username is required');
    } else{
        showSuccess(username,'verified')
    }
    if(email.value === ''){
        showError(email,'Email is not valid');
    // } else if (isValidEmail(email.value)){
    //     showError(email,'Email is not valid');

    } else{
        showSuccess(email)
    }
    if(password.value === ''){
        showError(password,'Password is required');
    } else{
        showSuccess(password)
    }
    if(password2.value === ''){
        showError(password2,'Confirm Password is required');
    } else{
        showSuccess(password2)
    }
   
    checkLenghtPassword(password,6,25)
    checkLenghtUsername(username,3,30);
    checkPasswordMatch(password,password2)
});

btn.addEventListener('click',function(){
    var body = 'Registration successful+' +'<br/>username:' +username + '<br/> email:' + email + '<br/> password' + password +'<br/> Congratulation' + username
   
   
   
    Email.send({
        Host:"smtp.gmail.com",
        Username: "ayobamiasaolu20@gmail.com",
        Password: 'ahcleckyxdkaocqx',
        To:  email,
        From: 'ayobamiasaolu20@gmail.com' ,
        Subject:  body  ,
     }). then (
        message => alert('check your mail for confirmation' )
     )
})