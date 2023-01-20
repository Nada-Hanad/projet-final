<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class CategoryView
{
    private $catTitle;
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }





    public function display()
    {

        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $this->catTitle = ucfirst($URL[1]);

        $main = new MainLayout();
        $main->displayLayout($this->catTitle, function () {
            $this->displayCategory();
        });
    }
    public function displayCategory()
    {

        content($this->catTitle, $this->data);
    }
}

$main = new MainLayout();
function content($catT, $list)
{


?>
    <div class="category-title">
        <h1><?php echo $catT ?></h1>
        <div class="filter-button">
            Filtrer
            <i class="fa-solid fa-sliders"></i>
        </div>
    </div>
    <form name="filterForm" class="filter-section">
        <div class="filter-item">
            <h2>Par catégorie</h2>
            <div class="cat-form" action="">
                <label>
                    <input type="checkbox" name="plats" id="plats">
                    Plats
                </label>
                <label>
                    <input type="checkbox" name="boissons" id="boissons">
                    Boissons
                </label>
                <label>
                    <input type="checkbox" name="dessert" id="dessert">
                    Dessert
                </label>
                <label>
                    <input type="checkbox" name="entrees" id="entrees">
                    Entrées
                </label>
            </div>

        </div>
        <div class="filter-item">
            <h2>Par temps</h2>
            <div class="par-temps" action="">
                Temps cuissant

                <div class="temps-item">

                    <label>
                        De
                        <input name="cuissantMin" type="number">
                        MIN
                    </label>

                    <label>
                        &nbsp; à
                        <input name="cuissantMax" type="number">
                        MIN
                    </label>
                </div>
                Temps repos
                <div class="temps-item">
                    <div class="temps-item">

                        <label>
                            De
                            <input name="reposMin" type="number">
                            MIN
                        </label>

                        <label>
                            &nbsp; à
                            <input name="reposMax" type="number">
                            MIN
                        </label>
                    </div>
                </div>
                Temps total
                <div class="temps-item">
                    <div class="temps-item">

                        <label>
                            De
                            <input name="totalMin" type="number">
                            MIN
                        </label>

                        <label>
                            &nbsp; à
                            <input name="totalMax" type="number">
                            MIN
                        </label>
                    </div>
                </div>
            </div>


        </div>
        <div class="filter-item">
            <h2>Par notation</h2>
            <div class="cat-form" action="">
                <label class="rating-input">
                    <input type="checkbox" name="1stars" id="1stars">

                    <div class="notation">
                        <div class="stars display-only">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>

                    </div>

                </label>
                <label class="rating-input">
                    <input type="checkbox" name="2stars" id="2stars">
                    <div class="notation">
                        <div class="stars display-only">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>

                    </div>
                </label>
                <label class="rating-input">
                    <input type="checkbox" name="3stars" id="3stars">
                    <div class="notation">
                        <div class="stars display-only">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked "></i>
                            <i class="fas fa-star checked "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>

                    </div>
                </label>
                <label class="rating-input">
                    <input type="checkbox" name="4stars" id="4stars">
                    <div class="notation">
                        <div class="stars display-only">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked "></i>
                            <i class="fas fa-star"></i>
                        </div>

                    </div>
                </label>
                <label class="rating-input">
                    <input type="checkbox" name="5stars" id="5stars">
                    <div class="notation">
                        <div class="stars display-only">
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked "></i>
                            <i class="fas fa-star checked"></i>
                        </div>

                    </div>
                </label>
            </div>
        </div>
        <div class="filter-item">
            <h2>Par saison</h2>
            <div class="cat-form" action="">
                <label>
                    <input type="checkbox" name="hiver" id="hiver">
                    Hiver
                </label>
                <label>
                    <input type="checkbox" name="printemps" id="printemps">
                    Printemps
                </label>
                <label>
                    <input type="checkbox" name="ete" id="ete">
                    Été
                </label>
                <label>
                    <input type="checkbox" name="automne" id="automne">
                    Automne
                </label>
            </div>
        </div>
        <div class="filter-item last">
            <h2>Par calorie</h2>
            <div class="calories" action="">

                <div class="temps-item">

                    <label>
                        De
                        <input name="calorieMin" type="number">
                        cals
                    </label>

                    <label>
                        &nbsp; à
                        <input name="calorieMax" type="number">
                        cals
                    </label>
                </div>
            </div>


        </div>
        <button class="primary-button apply-filter" type="submit">
            Appliquer
        </button>
    </form>
    <div class="news-container">
        <?php
        if (count($list) > 0) {

            foreach ($list as $recipe) {
                $m = new MainLayout();
        ?>

                <?php
                $m->RecipeCard($recipe->titre, $recipe->description, $recipe->image, $recipe->id);
                ?>

        <?php
            }
        } else {
            echo "<h2>Malheuresement il n y'a pas données à afficher. </h2>";
        }
        ?>

    </div>
    <script>
        const applyFilter = document.querySelector(".apply-filter");

        const filterButton = document.querySelector(".filter-button");
        const filterSection = document.querySelector(".filter-section");
        filterButton.addEventListener("click", () => {
            filterSection.classList.toggle("active");
        });
        applyFilter.addEventListener("click", (e) => {
            e.preventDefault();

            let maxCalories = document.filterForm.calorieMax.value
            let minCalories = document.filterForm.calorieMin.value
            let maxTime = document.filterForm.totalMax.value
            let minTime = document.filterForm.totalMin.value
            let hiver = document.filterForm.hiver.checked
            let printemps = document.filterForm.printemps.checked
            let ete = document.filterForm.ete.checked
            let automne = document.filterForm.automne.checked
            let oneStar = document.filterForm["1stars"].checked
            let twoStar = document.filterForm["2stars"].checked
            let threeStar = document.filterForm["3stars"].checked
            let fourStar = document.filterForm["4stars"].checked
            let fiveStar = document.filterForm["5stars"].checked
            let url = `http://localhost/Projet_Final/public/recipe/filter?maxCalories=${maxCalories}&minCalories=${minCalories}&maxTime=${maxTime}&minTime=${minTime}&hiver=${hiver}&printemps=${printemps}&ete=${ete}&automne=${automne}&oneStar=${oneStar}&twoStar=${twoStar}&threeStar=${threeStar}&fourStar=${fourStar}&fiveStar=${fiveStar}`

            fetch(url)
                .then(response => {

                    return response.json()
                })
                .then(data => {
                    console.log(data)
                    let newsContainer = document.querySelector(".news-container");
                    newsContainer.innerHTML = "";
                    data.forEach(recipe => {
                        let card = document.createElement("div");
                        card.classList.add("recipe-card");
                        card.innerHTML = `
                        <div class="recipe-card-image">
                            <img src="${recipe.image}" alt="">
                        </div>
                        <div class="recipe-card-content">
                            <h2>${recipe.titre}</h2>
                            <p>${recipe.description}</p>
                            <a href="http://localhost/Projet-Final/recipes/${recipe.id}">Voir la recette</a>
                        </div>
                        `;
                        newsContainer.appendChild(card);
                    })
                })


        });
    </script>
<?php
};
