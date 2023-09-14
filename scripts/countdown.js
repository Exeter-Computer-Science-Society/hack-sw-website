const countdown = document.querySelector("#countdown")

// Date  of the hackathons
let hackathonDate = new Date('2024-02-14')

setInterval(refreshTimer, 1000)

refreshTimer()


function refreshTimer() {

    let now = new Date()
    
    let diff = hackathonDate.getTime() - now.getTime()

    let days, hours, mins, seconds

    days = Math.floor(diff / (1000 * 60 * 60 * 24))

    diff -= days * 24 * 60 * 60 * 1000

    hours = Math.floor(diff / (1000 * 60 * 60))

    diff -= hours * 60 * 60 * 1000

    mins = Math.floor(diff / (1000 * 60))

    diff -= mins * 60 * 1000

    seconds = Math.floor(diff / 1000)

    const daysElCont = document.createElement("div")
    const hrsElCont = document.createElement("div")
    const minsElCont = document.createElement("div")
    const secsElCont = document.createElement("div")


    const daysEl = document.createElement("b")
    daysEl.innerText = days.toString()

    const hrsEl = document.createElement("b")
    hrsEl.innerText = hours.toString().padStart(2, '0')

    const minsEl = document.createElement("b")
    minsEl.innerText = mins.toString().padStart(2, '0')

    const secsEl = document.createElement("b")
    secsEl.innerText = seconds.toString().padStart(2, '0')


    const daysLbl = document.createElement("span")
    daysLbl.innerText = days === 1 ? 'Day' : 'Days'

    const hrsLbl = document.createElement("span")
    hrsLbl.innerText = hours === 1 ? 'Hour' : 'Hours'

    const minsLbl = document.createElement("span")
    minsLbl.innerText = mins === 1 ? 'Minute' : 'Minutes'

    const secsLbl = document.createElement("span")
    secsLbl.innerText = seconds === 1 ? 'Second' : 'Seconds'


    daysElCont.append(daysEl)
    daysElCont.append(daysLbl)

    hrsElCont.append(hrsEl)
    hrsElCont.append(hrsLbl)

    minsElCont.append(minsEl)
    minsElCont.append(minsLbl)

    secsElCont.append(secsEl)
    secsElCont.append(secsLbl)

    countdown.replaceChildren(daysElCont, hrsElCont, minsElCont, secsElCont)

}