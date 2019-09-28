let total;

let data = []
let used = 0

function idGenerator() {
    let id
    if (data.length === 0) {
        id = 0
    }
    else {
        id = data[data.length - 1].id + 1
    }
    return id
}

function listIdGenerator() {
    let id
    if (list.length === 0) {
        id = 0
    }
    else {
        id = list[list.length - 1].id + 1
    }
    return id
}

var list = []

const amount = document.querySelector('.amount');
const add = document.querySelector('.add-icon');
const item = document.querySelector('#item')
const prior = document.querySelector('#prior')
const items = document.querySelector('.items')
const calc = document.querySelector('#cal')
const exp = document.querySelector('.exp')
const breakdown = document.querySelector('#breakdown')
const showAmount = document.querySelector('.amount-showing')
const clearAll = document.querySelector('#clear')
const remaining = document.querySelector('.remaining')
const span = document.querySelector('.span')



function addNew() {
    const i = listIdGenerator()
    const html = `<div class="item rem" id=${i}>
    <!-- <p>Priority</p> -->
    <input class="exp" type="text">
    <select class="in">
        <option>Top</option>
        <option>Medium</option>
        <option>Low</option>
    </select>
    <ion-icon class="del" name="close-circle" id="del"></ion-icon>
</div>`
    items.insertAdjacentHTML('beforeEnd', html)
    var dat = { id: listIdGenerator() }
    list.push(dat)
}

function remove(value) {
    let ids, index;
    ids = data.map(cur => cur.id)
    index = ids.indexOf(value)
    if (index !== -1) {
        data.splice(index, 1)
    }
}

function del(e) {
    if (e.target.id === "del") {
        const parent = e.target.parentNode
        const parentId = e.target.parentNode.id
        parent.parentNode.removeChild(parent)
        remove(parentId)
    }
}

function removeAll() {
    const item = Array.from(document.querySelectorAll('.rem'))
    item.forEach(cur => {
        const parent = cur.parentNode
        parent.removeChild(cur)
    })
}


function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function showBreakdown() {
    let top = []
    let medium = []
    let low = []
    data.forEach(cur => {
        if (cur.priority === 'Top') {
            top.push(cur)
        }
        else if (cur.priority === 'Medium') {
            medium.push(cur)
        }
        else {
            low.push(cur)
        }
    })

    let percentages = []

    const html = data.map(cur => {
        let t, v, c
        if (cur.priority === 'Top') {
            t = (Math.floor((50 / top.length) * 100)) / 100 + '%'
            c = (50 / (top.length * 100))
            v = (Math.floor((c * total) * 100)) / 100
        }
        else if (cur.priority === 'Medium') {
            t = (Math.floor((30 / medium.length) * 100)) / 100 + '%'
            c = (30 / (medium.length * 100))
            v = (Math.floor((c * total) * 100)) / 100
        }
        else {
            t = (Math.floor((20 / low.length) * 100)) / 100 + '%'
            c = (20 / (low.length * 100))
            v = (Math.floor((c * total) * 100)) / 100
        }
        used += v
        percentages.push(c)
        return `<div class="align">
        <p>${cur.item}</p>
        <p>${t}</p>
        <p>₦${v}</p>
    </div>
    <div class="back">
        <div class="color"></div>
    </div>`
    }).join('')
    breakdown.innerHTML = html
    const back = document.querySelector('.back')
    const level = Array.from(document.querySelectorAll('.color'))
    let colors = []
    level.forEach((cur, i) => {
        let color
        color = getRandomColor()
        colors.push(color)
        cur.style.width = `${percentages[i] * back.offsetWidth}px`
        cur.style.backgroundColor = `${color}`
    })
}

function populate() {
    used = 0
    data = []
    total = amount.value
    showAmount.textContent = `₦${total}`
    if (!total) {
        alert('Please put an amount')
        return
    }
    if (total <= 0) {
        alert('Please put a positive amount')
        return
    }
    const exp = Array.from(document.querySelectorAll('.exp'))
    const inc = Array.from(document.querySelectorAll('.in'))
    try {
        exp.forEach((cur, i) => {
            if(!cur.value) {
                throw alert('please put an item')
            }
            const dat = {
                item: cur.value,
                id: cur.parentNode.id,
            }
            data[i] = dat
        })
    } catch(e) {
        console.log(e)
    }
    inc.forEach((cur, i) => {
        data[i].priority = cur.value
    })
    showBreakdown()
    remaining.style.display = 'block'
    span.textContent = `${total - used}`
}



add.addEventListener('click', addNew)
items.addEventListener('click', del)
cal.addEventListener('click', populate)
clearAll.addEventListener('click', removeAll)


