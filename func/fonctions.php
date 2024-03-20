<?php
function showTitle(string $title) : string{
    return $title;
}

function isValidate(array $recipe) : bool{
    if(array_key_exists('is_enabled', $recipe)){
        $isValid = $recipe['is_enabled'];
    }
    return $isValid;
}

function getRecipe(array $recipes) : array{
    $allRecipes =[];
    foreach($recipes as $recipe){
        
            $allRecipes[] = $recipe;
        
    }
    return $allRecipes;
}

function displayAuthor(string $author, array $users) : string{
    foreach($users as $user){
        if($author === $user["email"])
        return $user["full_name"] . '(' .$user["age"].')';

    }
}



function redirectToUrl(string $url): never{
    header("location: /{$url}");
    exit();
}