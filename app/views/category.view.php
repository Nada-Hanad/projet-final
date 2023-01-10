<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class CategoryView
{
    private $catTitle;

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

        content($this->catTitle);
    }
}

$main = new MainLayout();
function content($catT)
{
    $Card1 = (object) [
        'id' => 1,
        'title' => 'Recipe Title1',
        'description' => 'Recipe description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. A nihil doloremque pariatur. Aperiam sit facilis quisquam deleniti fugiat nemo explicabo?',
        'image' => 'https://images.unsplash.com/photo-1466637574441-749b8f19452f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVjaXBlfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60',
        'category' => 1
    ];
    $Card2 = (object) [
        'id' => 1,
        'title' => 'Recipe Title2',
        'description' => 'Recipe description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. A nihil doloremque pariatur. Aperiam sit facilis quisquam deleniti fugiat nemo explicabo?',
        'image' => 'https://images.unsplash.com/photo-1466637574441-749b8f19452f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVjaXBlfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60',
        'category' => 1
    ];
    $Card3 = (object) [
        'id' => 1,
        'title' => 'Recipe Title3',
        'description' => 'Recipe description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. A nihil doloremque pariatur. Aperiam sit facilis quisquam deleniti fugiat nemo explicabo?',
        'image' => 'https://images.unsplash.com/photo-1466637574441-749b8f19452f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVjaXBlfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60',
        'category' => 1
    ];
    $list = array($Card1, $Card2, $Card3, $Card1, $Card1, $Card1);

?>
    <div class="category-title">
        <h1><?php echo $catT ?></h1>
        <div class="filter-button">
            Filtrer
            <i class="fa-solid fa-sliders"></i>
        </div>
    </div>
    <div class="filter-section">
        <div class="filter-item">
            <h2>Par catégorie</h2>
            <form class="cat-form" action="">
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
            </form>

        </div>
        <div class="filter-item">
            <h2>Par temps</h2>
            <form class="par-temps" action="">
                Temps cuissant

                <div class="temps-item">

                    <label>
                        De
                        <input type="number">
                        MIN
                    </label>

                    <label>
                        &nbsp; à
                        <input type="number">
                        MIN
                    </label>
                </div>
                Temps repos
                <div class="temps-item">
                    <div class="temps-item">

                        <label>
                            De
                            <input type="number">
                            MIN
                        </label>

                        <label>
                            &nbsp; à
                            <input type="number">
                            MIN
                        </label>
                    </div>
                </div>
                Temps total
                <div class="temps-item">
                    <div class="temps-item">

                        <label>
                            De
                            <input type="number">
                            MIN
                        </label>

                        <label>
                            &nbsp; à
                            <input type="number">
                            MIN
                        </label>
                    </div>
                </div>
            </form>


        </div>
        <div class="filter-item">
            <h2>Par notation</h2>
            <form class="cat-form" action="">
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
            </form>
        </div>
        <div class="filter-item">
            <h2>Par saison</h2>
            <form class="cat-form" action="">
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
            </form>
        </div>
        <div class="filter-item last">
            <h2>Par calorie</h2>
            <form class="calories" action="">

                <div class="temps-item">

                    <label>
                        De
                        <input type="number">
                        cals
                    </label>

                    <label>
                        &nbsp; à
                        <input type="number">
                        cals
                    </label>
                </div>
            </form>


        </div>
        <div class="primary-button">
            Appliquer
        </div>
    </div>
    <div class="news-container">
        <?php
        foreach ($list as $recipe) {
            $m = new MainLayout();
        ?>

            <?php
            $m->RecipeCard($recipe->title, $recipe->description, $recipe->image, $recipe->id);
            ?>

        <?php
        }
        ?>

    </div>
    <script>
        const filterButton = document.querySelector(".filter-button");
        const filterSection = document.querySelector(".filter-section");
        filterButton.addEventListener("click", () => {
            filterSection.classList.toggle("active");
        });
    </script>
<?php
};
