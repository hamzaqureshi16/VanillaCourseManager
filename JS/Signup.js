window.onload = function () {
    console.log("Hello");
}
    
    function sayhello(e){
        if(e==='teacher'){
            document.getElementById('teacher').style.display = 'block';
            document.getElementById('student').style.display = 'none';
            document.getElementById('email').required = true; 
            document.getElementById('roll').required = false;
            document.getElementById('cgpa').required = false;
            document.getElementById('session').required = false;
            document.getElementById('semester').required = false;
            document.getElementById('program').required = false;

        }
        else{
            document.getElementById('teacher').style.display = 'none';
            document.getElementById('student').style.display = 'block';
            document.getElementById('email').required = false;
            document.getElementById('roll').required = true;
            document.getElementById('cgpa').required = true;
            document.getElementById('session').required = true;
            document.getElementById('semester').required = true;
            document.getElementById('program').required = true;

        }
    }

    function calcsemester(session) {
        let year = parseInt(session.substring(2,4))+2000;
        let sesh = session.substring(0,2);
    
        let sem = 0;
        if(sesh==="FA"){
            sem =  (new Date().getFullYear() - year)*2;
        
        }else{
            sem =  ((new Date().getFullYear() - year)*2)-1;
        }

        sem  = sem > 8 ? "Graduated" : sem;
        document.getElementById('semester').value = sem;
        
    }