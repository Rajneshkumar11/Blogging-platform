const fname=document.getElementById('firstname')
const lname=document.getElementById('lastname')
const uname=document.getElementById('username')
const email=document.getElementById('email')
const pass1=document.getElementById('password')
const pass2=document.getElementById('password2')
const errorElement=document.getElementById('error')
const form=document.getElementById('form1')

form.addEventListener('submit', (e) => {
	let messages=[]
	if(/^[a-zA-Z]+$/.test(fname)){
		messages.push('Enter valid firstname')
		alert("Enter valid firstname");
	}
	if(/^[a-zA-Z]+$/.test(lname)){
		messages.push('Enter valid lastname')
		alert("Enter valid lastname");
	}
	if(pass1.value.length<=6){
		messages.push('Password must be more than 6 characters')
		alert("Password must be more than 6 characters");
	}
	if(pass2.value!=pass1.value){
		messages.push('Passwords dont match')
		alert("Passwords dont match");
	}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)))
	{
		messages.push('Enter valid email id')
	    alert("Enter valid email id");
	}
	if(messages.length>0){
		e.preventDefault()
	}
})