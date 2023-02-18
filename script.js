
var user = document.getElementById('dona').innerHTML;
if (user == "BERNARDO")
{
        var ar= document.getElementById('modif');
        ar.style.display="none";
}


function pliz()
{
	var be=document.getElementById('modif');
	be.style.display="none";
}



let menu = document.querySelector('.fa-bars');
let navbar = document.querySelector('.navbar');

menu.addEventListener('click', function() {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('nav-toggle');
});

window.addEventListener('scroll', () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('nav-toggle');
});
