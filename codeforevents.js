
            const previousBtn = document.getElementById("previousBtn");
            const nextBtn = document.getElementById("nextBtn");
            const finishBtn = document.getElementById("finishBtn");
            const content = document.getElementById("content");
            const bullets = [...document.querySelectorAll(".bullet")];

            
            var add = document.getElementById("duplicate");
            var add2 = document.getElementById("duplicate2");
            var form = document.getElementById("form");
            var tbl = document.getElementById("tbl");

            var lastBullet = document.getElementById("last");
            var steps = [document.getElementById("step1") , document.getElementById("step2") , document.getElementById("step3") , document.getElementById("step4")];

            const Max_Steps = 4;
            let currentStep = 1;
            var idx = 0;

            nextBtn.addEventListener('click', () =>{
                const currentBullet = bullets[currentStep - 1];

                currentBullet.classList.add("completed");
                currentStep++;
                previousBtn.disabled = false;
                
                if(currentStep == Max_Steps){
                    finishBtn.disabled = false;
                    nextBtn.disabled = true;
                    lastBullet.style.background = "#134032";
                    lastBullet.style.color = "#fff";
                }
                content.innerText =  currentStep;

                steps[idx].style.left = "-950px";
                steps[idx + 1].style.left = "0px";
                idx++;

                
                form.style.height = "560px";
                if(currentStep == 2){
                    form.style.height = k;
                }
                else if(currentStep == 3){
                    form.style.height = y;
                }
                else if(currentStep == 4){
                    form.style.height = c;
                }
            });
            
            previousBtn.addEventListener('click', () =>{
                const previousBullet = bullets[currentStep - 2];
               
                previousBullet.classList.remove("completed");
                currentStep--;
                nextBtn.disabled = false;
                finishBtn.disabled = true;

                lastBullet.style.background = "#fff";
                lastBullet.style.color = "#134032";

                if(currentStep == 1){
                    previousBtn.disabled = true;
                }

                content.innerText =  currentStep;

                steps[idx].style.left = "950px";
                steps[idx - 1].style.left = "0px";
                idx--;

                form.style.height = "560px";
                if(currentStep == 2){
                    form.style.height = k;
                }
                else if( currentStep == 3){
                    form.style.height = y;
                }
                else if(currentStep == 4){
                    form.style.height = c;
                }
               
                
            });

            var pictureBtn = document.getElementById("pictureBtn");
            var btn = document.getElementById("pic");

            function ChoosePhoto(){
                btn.click();
            }


            let img = document.getElementById("img");
            let button = document.getElementById("pic");

                button.addEventListener("change", function(){
                    if(this.files[0].type != "image/jpeg" &&  this.files[0].type != "image/png" && this.files[0].type != "image/gif"){
                        alert("Sorry invalid file type. Please upload an image");
                    }
                    else{
                        img.style.display = "block"
                        img.src = URL.createObjectURL(this.files[0])
                    }

                })
                
                var i = 560;
                var j = 140;
                var k = 0;
                var l = 1;
                function duplicate(){
                l++;
                k = i + j + "px";

                var createFirst = document.createElement("input");
                createFirst.setAttribute("type","text");
                createFirst.setAttribute("class","txtbox");
                createFirst.setAttribute("placeholder","Firstname");
                createFirst.setAttribute("required", "");

                var createLast = document.createElement("input");
                createLast.setAttribute("type","text");
                createLast.setAttribute("class","txtbox");
                createLast.setAttribute("placeholder","Lastname");
                createLast.setAttribute("required", "");
             
                var createOrg = document.createElement("input");
                createOrg.setAttribute("type","text");
                createOrg.setAttribute("class","txtbox");
                createOrg.setAttribute("placeholder","Organization/Company");
                createOrg.setAttribute("required", "");

                var createHead = document.createElement("h3");
                createHead.innerText = l;
    
                var createDiv = document.createElement("div");
                createDiv.setAttribute("id","border")
                add.appendChild(createDiv);
                createDiv.appendChild(createHead);
                createDiv.appendChild(createFirst);
                createDiv.appendChild(createLast);
                createDiv.appendChild(createOrg);

                form.style.height = k;
                j = j + 340;
                }

                var w = 560;
                var x = 50;
                var y = 0;
                var z = 1;
                function addCrit(){
                    z++;
                    y = w + x + "px";

                    if(z < 6){
                        var row = document.createElement("tr");
                        row.setAttribute("id", "rowData");

                        var desc = document.createElement("textarea");
                        desc.setAttribute("rows", "5");
                        desc.setAttribute("cols", "1");
                        desc.setAttribute("id", "txtArea");

                        var percent = document.createElement("input");
                        percent.setAttribute("type", "number");
                        percent.setAttribute("min", "1");
                        percent.setAttribute("max", "100");
                        percent.setAttribute("value", "0");

                        var DataDesc = document.createElement("td");
                        DataDesc.setAttribute("id", "desc");

                        var DataPercent = document.createElement("td");
                        DataDesc.setAttribute("id", "percent");
                        

                        tbl.appendChild(row);
                        row.appendChild(DataDesc);
                        DataDesc.appendChild(desc);
                        row.appendChild(DataPercent);
                        DataPercent.appendChild(percent);

                        form.style.height = y;
                        x = x + 340;

                        if(z == 5){
                            form.style.height = "1150px";
                        }
                    }
                 }

                 
                var a = 560;
                var b = 140;
                var c = 0;
                var d = 1;
                function duplicate2(){
                    d++;
                    c = a + b + "px";
                    var Fn = document.createElement("input");
                    Fn.setAttribute("type","text");
                    Fn.setAttribute("class","txtbox");
                    Fn.setAttribute("placeholder","Firstname");
                    Fn.setAttribute("required", "");

                    var Ln = document.createElement("input");
                    Ln.setAttribute("type","text");
                    Ln.setAttribute("class","txtbox");
                    Ln.setAttribute("placeholder","Lastname");
                    Ln.setAttribute("required", "");
        
                    var credential = document.createElement("input");
                    credential.setAttribute("type","text");
                    credential.setAttribute("class","txtbox");
                    credential.setAttribute("placeholder","Credentials");
                    credential.setAttribute("required", "");

                    var no = document.createElement("h3");
                    no.innerText = d;

                    var createborder = document.createElement("div");
                    createborder.setAttribute("id","border2")
                    add2.appendChild(createborder);
                    createborder.appendChild(no);
                    createborder.appendChild(Fn);
                    createborder.appendChild(Ln);
                    createborder.appendChild(credential);

                    
                    form.style.height = c;
                    b = b + 340;
                }
                var sub = document.getElementById("sub");
                function subMenu(){
                    sub.style.display = "block";
                }
                function subOut(){
                    sub.style.display = "none";
                }






                

    