<?php
$urls = [
    "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=280&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1530026405186-ed1f139313f8?w=600&q=80",
    "https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=600&h=300&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=800&q=80",
    "https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=600&h=300&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=600&q=80",
    "https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=280&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=280&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1579165466741-7f35e4755660?w=600&h=300&fit=crop&auto=format",
    "https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=1600&q=80",
    "https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=600&q=80",
    "https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=600&q=80",
    "https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80",
    "https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=600&h=300&fit=crop&auto=format"
];
if(!is_dir("public/images/exports")) mkdir("public/images/exports", 0777, true);
$c=1;
foreach(array_unique($urls) as $u){
    $data = file_get_contents($u);
    $name = "project_image_".$c.".jpg";
    file_put_contents("public/images/exports/".$name, $data);
    echo "Saved {$name}\n";
    $c++;
}
?>
