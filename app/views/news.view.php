<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class NewsView
{
    public function display()
    {
        $main = new MainLayout();
        function content()
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
            <h1 class="news-title">News</h1>
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
<?php
        };

        $main->displayLayout("Acceuil", function () {
            return
                content();
        });
    }
}
