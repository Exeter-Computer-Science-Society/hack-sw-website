

async function typewriter(textElement) {
    return new Promise((resolve, reject) => {

        let text = textElement.innerText
        textElement.innerText = ''
    
        let space = false
    
        for (let i = 0; i < text.length; i++) {
            setTimeout(() => {
    
                if(!space) {
                    textElement.innerText += text[i]
                } else {
                    textElement.innerText += ' ' + text[i]
                }
    
                if(text[i] === ' ') {
                    space = true
                } else {
                    space = false
                }

                if(i === text.length - 1) {
                    resolve()
                }
    
            }, ((i + 1) * 180))
        }
    })
}

let els = document.querySelectorAll(".typewriter")

typeWriterInOrder(els)

async function typeWriterInOrder(elements) {
    await wait(1000)
    for (const el of elements) {
        console.log(el)
        el.style.display = "inline"
        await typewriter(el)
        await wait(250)
    }
}

async function wait(ms) {
    return new Promise((res, rej) => setTimeout(res, ms))
}