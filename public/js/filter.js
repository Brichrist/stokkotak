let list = document.querySelectorAll('.list');
let itemBox = document.querySelectorAll('.itemBox');

for (let i = 0; i < list.length; i++) {
    list[i].addEventListener('click', function () {
        for (let j = 0; j < list.length; j++) {
            list[j].classList.remove('active');
        }
        this.classList.add('active');

        let dataFilter = this.getAttribute('data-filter');

        for (let z = 0; z < itemBox.length; z++) {
            itemBox[z].classList.remove('active');
            itemBox[z].classList.add('hide');

            if (itemBox[z].getAttribute('data-item') == dataFilter || dataFilter == 'all') {
                itemBox[z].classList.remove('hide');
                itemBox[z].classList.add('active');
            }
            if (itemBox[z].getAttribute('data-item1') == dataFilter || dataFilter == 'all') {
                itemBox[z].classList.remove('hide');
                itemBox[z].classList.add('active');
            }
        }
    })
}