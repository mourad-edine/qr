</section>
</main>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const prenom = document.getElementById('prenom');
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: `https://edine.youpihost.fr/visionage.php?code=${prenom}`,
            width: 180,
            height: 180
        });
    });
</script>
<script src="./js/qrious.js"></script>
<script src="./js/script.js"></script>
</body>
</html>
