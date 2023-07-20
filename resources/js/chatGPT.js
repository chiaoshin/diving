const chatLog = document.getElementById('chat-log'),
    userInput = document.getElementById('user-input'),
    sendButton = document.getElementById('send-button'),
    buttonIcon = document.getElementById('button-icon'),
    info = document.querySelector('.info');

sendButton.addEventListener('click', sendMessage);
userInput.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

const messageText = '你該小心@@@';

window.test_2_sendMessage = (message, dictData) => {
    if (message in dictData) {
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', dictData[message].replaceAll('\\n', '\n'));
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }else{
        appendMessage('user', message);
        userInput.value = '';

        const options = {
            method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
            'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
            },
            body: `{"messages":[{"role":"user","content":"${message}"}]}`
        };
        fetch('https://chatgpt53.p.rapidapi.com/', options).then((response) => response.json()).then((response) => {
            appendMessage('bot', response.choices[0].message.content);

            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }).catch((err) => {
            if (err.name === 'TypeError') {
                appendMessage('bot', 'Error : Check Your Api Key!');
                buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
                buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
            }
        });
    }
}

/* 修改成這樣, 因為webpack打包後這些程式碼都會被包起來 變成閉包中的一個方法
 無法從最外部直接呼叫, 因此需要將這個方法指派到 window 這個瀏覽器上 這樣才能在模板中呼叫 */
window.test_sendMessage = (message) => {
    // if message = empty do nothing
    if (message === '') {
        return;
    }
    // if message = developer - show our message
    else if (message === 'developer') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', 'This Source Coded By Reza Mehdikhanlou \nYoutube : @AsmrProg');
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }
    // if message = 潛水訊息 - show our message
    else if (message === '潛水注意事項') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', '潛水注意事項： \n你該小心!!!'+messageText);
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }
    // if message = 潛水訊息 - show our message
    else if (message === '小琉球龍蝦洞') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n 雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！');
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }

    // else if none of above
    // appends users message to screen
    appendMessage('user', message);
    userInput.value = '';

    const options = {
        method: 'POST',
	headers: {
		'content-type': 'application/json',
		'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
		'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
            // 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
            // if you want use official api
            /*
            'content-type': 'application/json',
            'X-RapidAPI-Key': 'cf7bf6f5a5msh21bb0dfb81662c1p131879jsnd3dcc0ac8295',
            'X-RapidAPI-Host': 'openai80.p.rapidapi.com'
            */
        },
        body: `{"messages":[{"role":"user","content":"${message}"}]}`
        // if you want use official api you need have this body
        // `{"model":"gpt-3.5-turbo","messages":[{"role":"user","content":"${message}"}]}`
    };
    // official api : 'https://openai80.p.rapidapi.com/chat/completions';
    fetch('https://chatgpt53.p.rapidapi.com/', options).then((response) => response.json()).then((response) => {
        appendMessage('bot', response.choices[0].message.content);

        buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
        buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }).catch((err) => {
        if (err.name === 'TypeError') {
            appendMessage('bot', 'Error : Check Your Api Key!');
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }
    });
}

function sendMessage() {
    const message = userInput.value.trim();
    // if message = empty do nothing
    if (message === '') {
        return;
    }
    // if message = developer - show our message
    else if (message === 'developer') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', 'This Source Coded By Reza Mehdikhanlou \nYoutube : @AsmrProg');
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }
    // if message = 潛水訊息 - show our message
    else if (message === '潛水注意事項') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', '潛水注意事項： \n你該小心!!!'+messageText);
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }
    // if message = 潛水訊息 - show our message
    else if (message === '小琉球龍蝦洞') {
        // clear input value
        userInput.value = '';
        // append message as user - we will code it's function
        appendMessage('user', message);
        // sets a fake timeout that showing loading on send button
        setTimeout(() => {
            // send our message as bot(sender : bot)
            appendMessage('bot', '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n 雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！');
            // change button icon to default
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }, 2000);
        return;
    }

    // else if none of above
    // appends users message to screen
    appendMessage('user', message);
    userInput.value = '';

    const options = {
        method: 'POST',
	headers: {
		'content-type': 'application/json',
		'X-RapidAPI-Key': 'a20e947e7fmshdda6e7ef8f8269fp1c6b93jsn4bb98aa24e21',
		'X-RapidAPI-Host': 'chatgpt53.p.rapidapi.com'
        },
        body: `{"messages":[{"role":"user","content":"${message}"}]}`
    };
    fetch('https://chatgpt53.p.rapidapi.com/', options).then((response) => response.json()).then((response) => {
        appendMessage('bot', response.choices[0].message.content);

        buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
        buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
    }).catch((err) => {
        if (err.name === 'TypeError') {
            appendMessage('bot', 'Error : Check Your Api Key!');
            buttonIcon.classList.add('fa-solid', 'fa-paper-plane');
            buttonIcon.classList.remove('fas', 'fa-spinner', 'fa-pulse');
        }
    });
}

function appendMessage(sender, message) {
    info.style.display = "none";
    // change send button icon to loading using fontawesome
    buttonIcon.classList.remove('fa-solid', 'fa-paper-plane');
    buttonIcon.classList.add('fas', 'fa-spinner', 'fa-pulse');

    const messageElement = document.createElement('div');
    const iconElement = document.createElement('div');
    const chatElement = document.createElement('div');
    const icon = document.createElement('i');

    chatElement.classList.add("chat-box");
    iconElement.classList.add("icon");
    messageElement.classList.add(sender);
    messageElement.innerText = message;

    // add icons depending on who send message bot or user
    if (sender === 'user') {
        icon.classList.add('fa-regular', 'fa-user');
        iconElement.setAttribute('id', 'user-icon');
    } else {
        icon.classList.add('fa-solid', 'fa-robot');
        iconElement.setAttribute('id', 'bot-icon');
    }

    iconElement.appendChild(icon);
    chatElement.appendChild(iconElement);
    chatElement.appendChild(messageElement);
    chatLog.appendChild(chatElement);
    chatLog.scrollTo = chatLog.scrollHeight;

}

// chatgpt api
// Endpoint URL
const endpointUrl = "https://api.openai.com/v1/models";

// Header Parameters
const headerParameters = {
  "Authorization": "Bearer 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"
};

// Setting API call options
const options = {
  method: "GET",
  headers: headerParameters
};

// Function to make API call
async function getModels() {
  try {
    const response = await fetch(endpointUrl, options);

    // Printing response
    printResponse(response);
  } catch (error) {
    // Printing error message
    printError(error);
  }
}

// Calling function to make API call
getModels();