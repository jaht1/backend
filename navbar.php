<nav>
            <!-- Logo och meny finns i nav -->
            <ul>
                <a href="home/">Home</a>
                <a href="projekt1/">Projekt 1</a>
                <a href="projekt2/">Projekt 2</a>
                
            </ul>
        </nav>
        <script>
        //Ifall vi behöver en current page styling
        if (location.href == "/projekt2"){
            document.getElementByTagName("nav")[0].children[2].style = "text-decoration: underline">;
        }

        </script>