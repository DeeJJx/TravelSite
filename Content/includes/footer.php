<style>
<?php include '../Assets/stylesheets/stylesheet.css'; ?>
</style>

<html>
    <div class="appwrap">
        <h2>Search Cusco for todays weather!</h2>
        <header>
            <input type="text" autocomplete="off" class="search-box"
            placeholder="Press Enter"/>
        </header>
        <main>
            <section class="location">
                <div class="city"></div>
                <div class="date"></div>
            </section>
            <div class="current">
                <div class="temp"><span></span></div>
                <div class="weather"></div>
                <div class="hi-low"></div>
            </div>
        </main>
        
    </div>
    <footer>
        ©Cusco Travel and Tourism Board 2021
    </footer>
    <script src="../Assets/scripts/main.js"></script>
</html>