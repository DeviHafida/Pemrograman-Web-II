<style>
    .footer {
        margin-top: auto;
        background: linear-gradient(to right, #fce4ec, #f8bbd0);
        color: #6a1b9a;
        padding: 20px 15px;
        font-size: 13px;
        border-top: 2px dashed #f48fb1;
        box-shadow: 0 -2px 6px rgba(240, 128, 128, 0.15);
        font-family: 'Segoe UI', sans-serif;
    }

    .footer-content {
        max-width: 900px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        align-items: flex-start;
    }

    .footer-logo img {
        width: 150px;
        border-radius: 8px;
        background-color: #fff;
        padding: 4px;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
    }

    .footer-section {
        flex: 1;
        min-width: 220px;
    }

    .footer-section h4 {
        margin-bottom: 6px;
        font-size: 14px;
        color: #ad1457;
        font-weight: bold;
    }

    .footer-section p,
    .footer-section a {
        font-size: 12px;
        line-height: 1.6;
        color: #6a1b9a;
        text-decoration: none;
    }

    .footer-section a:hover {
        text-decoration: underline;
        color: #d81b60;
        transition: 0.3s ease;
    }

    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-section {
            margin-top: 15px;
        }
    }
</style>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <img src="public/images/logo.png" alt="Logo">
        </div>
        <div class="footer-section">
            <h4>Ruang Sosial</h4>
            <p>📧 <a href="mailto:kontak@edukasi.id">titikbalik@edukasi.com</a></p>
            <p>📞 <a href="tel:+6281234567890">+62 812-3456-7890</a></p>
            <p>📷 <a href="https://instagram.com/edukasi.id" target="_blank">@edukasi.id</a></p>
        </div>
        <div class="footer-section">
            <h4>About Us</h4>
            <p>Memberikan edukasi seputar pemberdayaan perempuan melalui literasi dan ruang cerita aman.</p>
        </div>
    </div>
</footer>