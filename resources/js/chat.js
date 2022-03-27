const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    fetch(form.dataset['outgoing'], {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            method: 'POST',
            body: new FormData(form),
        })
        .then(() => {
            inputField.value = "";
            scrollToBottom();
        });
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    fetch(form.dataset['incoming'])
        .then((response) => response.text())
        .then(function (data) {
            chatBox.innerHTML = data;
            if (!chatBox.classList.contains("active")) {
                scrollToBottom();
            }
        });
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
