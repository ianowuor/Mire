let time= new Date();
let month=time.getMonth();
let day=time.getDate();
let Exact_month="";

let months = ["January", "February", "March", "April", "May", "June", "July", "August", "Sepetember", "October", "November", "December"];

for (let i = 0; i <= 11; i++) {
    if (i == month) {
        Exact_month = months[i];
        break;
    }
}

// function Exact(){
//     if(month==0){
//         Exact_month="January";
//     }else if(month==1){
//         Exact_month="February";
//     }else if(month==2){
//         Exact_month="March";
//     }else if(month==3){
//         Exact_month="April";
//     }else if(month==4){
//         Exact_month="May";
//     }else if(month==5){
//         Exact_month="June";
//     }else if(month==6){
//         Exact_month="July";
//     }else if(month==7){
//         Exact_month="Augast";
//     }else if(month==8){
//         Exact_month="September";
//     }else if(month==9){
//         Exact_month="October";
//     }else if(month==10){
//         Exact_month="November";
//     }else if(month==11){
//         Exact_month="December";
//     }
//     return Exact_month;
// }
if(document.getElementById(day).innerText==day){
    document.getElementById(day).style.color="goldenrod";
}
document.getElementById("month").innerHTML=Exact_month;






function vacancy(){
    document.getElementById("section2_2").innerHTML="<iframe id ='iframe1' src='http://localhost/Mire%20Real%20Estate/vacant.php'></iframe>";
}
function mytenants(){
    document.getElementById("section2_2").innerHTML="<iframe id ='iframe1' src='http://localhost/Mire%20Real%20Estate/tenants.php'></iframe>";
}
function update_tenants(){
    document.getElementById("section2_2").innerHTML="<iframe id ='iframe1' src='http://localhost/Mire%20Real%20Estate/updatehouse.php'></iframe>";
}
/*function mytenants(){
    let section2_1=document.createElement("div");
    section2_1.id="section2_2";
    section2_1.innerHTML=
    let line=document.createElement("div");
    line.id="line1";
    section2_1.appendChild(line)
   document.getElementById("section2").appendChild(section2_1);

}
function update_tenants(){
    let section2_1=document.createElement("div");
    section2_1.id="section2_2";
    section2_1.innerHTML="<iframe id ='iframe1' src='http://localhost/Mire%20Real%20Estate/updatehouse.php'></iframe>";
    section2_1.style.objectFit="cover"
    let line=document.createElement("div");
    line.id="line1";
    section2_1.appendChild(line)
   document.getElementById("section2").appendChild(section2_1);

}*/