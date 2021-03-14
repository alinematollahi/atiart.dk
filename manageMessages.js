window.addEventListener("load",getMessages);

function getMessages() {

    var messageTable = document.getElementById("messageTable");

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {

            var response = JSON.parse(this.responseText);

            for( var i=0; i < response.length; i++) {
                let tr = document.createElement("tr");
                messageTable.appendChild(tr);

                let date = document.createElement("td");
                tr.appendChild(date);
                date.classList = "date";
                date.innerHTML = response[i].messagedate;

                let time = document.createElement("td");
                tr.appendChild(time);
                time.classList = "time";
                time.innerHTML = response[i].messagetime;

                let username = document.createElement("td");
                tr.appendChild(username);
                username.classList = "user-name";
                username.innerHTML = response[i].username;

                let useremail = document.createElement("td");
                tr.appendChild(useremail);
                useremail.classList = "user-email";
                useremail.innerHTML = response[i].useremail;

                let usermessage = document.createElement("td");
                tr.appendChild(usermessage);
                usermessage.classList = "message-txt";
                usermessage.innerHTML = response[i].usermessage;

                let removeBtn = document.createElement("td");
                tr.appendChild(removeBtn);
                removeBtn.classList = "remove-message";

                var hideWindow = document.createElement("div");
                removeBtn.appendChild(hideWindow);
                hideWindow.classList = "hide-window";

                let trash = document.createElement("i");
                removeBtn.appendChild(trash);
                trash.classList = "fas fa-trash-alt";
        
                var question = document.createElement("div");
                hideWindow.appendChild(question);
                question.classList = "question";
        
                var questionText = document.createTextNode("Are you sure to remove message ?!");
                question.appendChild(questionText);
        
                var nobtn = document.createElement("button");
                question.appendChild(nobtn);
                nobtn.innerHTML = "No";
                nobtn.type = "button";
        
                var yesbtn = document.createElement("button");
                question.appendChild(yesbtn);
                yesbtn.innerHTML = "Yes";
                yesbtn.type = "button";
        
                removeBtn.addEventListener("click", (event) => {
                    //alert(event.target.tagName);
                    event.target.parentElement.children[0].style.display = "block";
                });
        
                nobtn.addEventListener("click", (event) => {
                    event.target.parentElement.parentElement.parentElement.children[0].style.display = "none";
                });

                let messageId = response[i].id;

                yesbtn.addEventListener("click",(event)=>{

                    let rm = event.target.parentElement.parentElement.parentElement;
                    
                    let formData = new FormData();
                    formData.append('messageId', messageId);

                    let xhr = new XMLHttpRequest();
                    xhr.onload = function () {
                        if (xhr.status == 200) {

                            let timer = setInterval(func1, 5);
                            let counter = 0;

                            function func1() {
                                if (counter == 100) {
                                    clearInterval(timer);
                                    setTimeout(func2, 3000);

                                    function func2() {
                                        let timer1 = setInterval(func3, 3);
                                        let counter1 = 100;

                                        function func3() {
                                            if (counter1 == 0) {
                                                clearInterval(timer1);
                                                messages.style.display = "none"
                                            } else {
                                                counter1--;
                                                messages.style.opacity = counter1 / 100;
                                            }
                                        }
                                    }
                                } else {
                                    counter++;
                                    messages.style.display = "block"
                                    messages.style.opacity = counter / 100;
                                }
                            }

                            rm.parentElement.parentElement.removeChild(rm.parentElement);

                            messages.innerHTML = "Message Removed";
                            messages.style.color = "red";

                        } else {
                            messages.style.display = "block";
                            messages.style.color = "red";
                            messages.innerHTML = 'err';
                        }
                    }
        
                    xhr.open('POST', 'getMessage.php', true);
                    xhr.send(formData);
                });                


            }

        } else {
            document.write('err');
        }
    };
    xhr.open("GET", "getMessage.php?getMessage=ok", true);
    xhr.send();
}