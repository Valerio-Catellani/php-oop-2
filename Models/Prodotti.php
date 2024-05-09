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

    public function __construct(int $id, string $img, string $name, string $prezzo, $animale, $valutazione)
    {
        $this->id = $id;
        $this->img = $img;
        $this->name = $name;
        $this->prezzo = $prezzo;
        $this->animale = $animale;
        $this->valutazione = $valutazione;
    }


    /**
     * scopo: ritornare una lista di elementi (come array di oggetti PRODOTTO) che contengono tutte le loro caratteristiche, di cui una (animale) deve essere un oggetto categoria.
     */
    public static function fetchAll(string $path)
    {
        //recupero i dati dal db, li converto in un array associativo e li salvo in una variabile
        $data = file_get_contents(__DIR__ . '/../resurces/' . $path . '.json');
        $dataToArray = json_decode($data, true);
        //recupero tutte le categorie e le salvo dentro un array come oggetti
        $arrayAllCategories = Category::getAllCategories();
        //istanzio la lista di elementi da ritornare (inizialmente come vuota)
        $elements = [];

        //per ogni elemento del db immagazzinato in dataToArray vado creare un new Prodotto(), prima di farlo però gli devo passare una categoria che è un oggetto.
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
