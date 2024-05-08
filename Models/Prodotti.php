<?php
include __DIR__ . "/Category.php";
class Prodotto
{
    protected $id;
    protected $img;
    protected $name;
    protected $prezzo;
    public Category $animale;
    protected $valutazione;

    public function __construct($id, $img, $name, $prezzo, $animale, $valutazione)
    {
        $this->id = $id;
        $this->img = $img;
        $this->name = $name;
        $this->prezzo = $prezzo;
        $this->animale = $animale;
        $this->valutazione = $valutazione;
    }


    public static function fetchAll($path)
    {
        $data = file_get_contents(__DIR__ . '/../resurces/' . $path . '.json');
        $dataToArray = json_decode($data, true);
        $arrayAllCategories = Category::getAllCategories();
        $elements = [];

        foreach ($dataToArray as $item) {
            $category = null;
            foreach ($arrayAllCategories as $categoriaSingola) {
                if ($categoriaSingola->name == $item["animale"]) {
                    $category = $categoriaSingola;
                }
            }
            $elements[] = new Prodotto($item['id'], $item['img'], $item['name'], $item['prezzo'], $category, $item['valutazione']);
        }
        var_dump($elements);
        return $elements;
    }
}
