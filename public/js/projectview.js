document.addEventListener('DOMContentLoaded', function () {
    var listView = document.querySelector('.list-view');
    var gridView = document.querySelector('.grid-view');
    var projectsList = document.querySelector('.project-boxes');

    listView.addEventListener('click', function () {
        gridView.classList.remove('active');
        listView.classList.add('active');
        projectsList.classList.remove('jsGridView');
        projectsList.classList.add('jsListView');
    });

    gridView.addEventListener('click', function () {
        gridView.classList.add('active');
        listView.classList.remove('active');
        projectsList.classList.remove('jsListView');
        projectsList.classList.add('jsGridView');
    });

    var moreBtns = document.querySelectorAll('.project-btn-more');

    moreBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            var elem = this.nextElementSibling;
            if (elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length) {
                this.nextElementSibling.style.display = "none";
            } else {
                this.nextElementSibling.style.display = "flex";
            }
        });
    });

});
