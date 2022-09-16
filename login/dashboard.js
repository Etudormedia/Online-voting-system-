let btn = document.querySelector('.btn');


var count = 0;
var voteCount = [];

btn.addEventListener("click", (e)=>{
    e.preventDefault();
    count ++;
    voteCount.push(count);
    alert('clicked');
});