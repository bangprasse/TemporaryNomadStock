</section>

<!-- Ion Icons Module -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    function loadPage(page, push = true) {

        fetch('ajax.php?page=' + page)

            .then(res => res.text())

            .then(html => {

                document.getElementById('content').innerHTML = html;

                /* active navbar */
                document.querySelectorAll('.nav-btn')
                    .forEach(btn => btn.classList.remove('active'));

                document.querySelector(`[data-page="${page}"]`)
                    ?.classList.add('active');

                /* update URL */
                if (push) {
                    history.pushState({}, '', page);
                }

            });

    }

    /* navbar click */
    document.querySelectorAll('.nav-btn')
        .forEach(button => {

            button.addEventListener('click', function() {

                let page = this.dataset.page;

                loadPage(page);

            });

        });

    /* browser back/forward */
    window.onpopstate = function() {

        let page = location.pathname.replace('/', '');

        if (page === '') {
            page = 'home';
        }

        loadPage(page, false);

    };
</script>

</body>

</html>