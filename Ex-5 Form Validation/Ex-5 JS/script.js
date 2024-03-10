function fun()
{
    let name=document.getElementById("name").value;
    let ename=document.getElementById("pname");
    if(name=="")
        ename.innerHTML="Invalid Name.";

    let mail=document.getElementById("email").value;
    let email=document.getElementById("pmail");
    if(mail=="")
        email.innerHTML="Invalid Mail ID.";

    let gend=document.getElementsByName("gender");
    let egend=document.getElementById("pgend");
    let selected = false;
    for(let i=0;i<gend.length;i++) {
        if(gend[i].checked) 
        {
            selected = true;
            break;
        }
    }
    if (!selected)
        egend.innerHTML="Choose a Gender.";

    let pass1=document.getElementById("cpass").value;
    let epass1=document.getElementById("pcpass");
    if(pass1=="" || pass1.length<8)
        epass1.innerHTML="Invalid Password.";
    
    let pass2=document.getElementById("pass").value;
    let epass2=document.getElementById("ppass");
    if(pass2!=pass1)
        epass2.innerHTML="Enter the Previously enterd Password.";  
    else if(pass2=="") 
        epass2.innerHTML="Invalid Password.";

    let num=document.getElementById("number").value;
    let numsstr=num.toString();
    let enumb=document.getElementById("pnum");
    if(numsstr.length!=10)
        enumb.innerHTML="Invalid Phone Number.";

    let dob = document.getElementById("dob").value;
    let edob = document.getElementById("pdob");
    if (dob === "")
        edob.textContent = "Please select a date of birth.";


    let addr=document.getElementById("address").value;
    let eaddr=document.getElementById("paddr");
    if(addr=="")
        eaddr.innerHTML="Invalid Address.";

    let loc1=document.getElementById("loc").value;
    let eloc=document.getElementById("ploc");
    if(loc1==="choose")
        eloc.innerHTML="Invalid Location.";        
}