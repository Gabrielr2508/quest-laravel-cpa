<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Models\CsvFileImporter;
use Input;
use Redirect;

class CsvImportController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function store()
  {
    //dd('here1');
      // Check if form submitted a file
      if (Input::hasFile('csv_import')) {
        //dd('here2');
          $csv_file = Input::file('csv_import');

          // You wish to do file validation at this point
          if ($csv_file->isValid()) {

              // We can also create a CsvStructureValidator class
              // So that we can validate the structure of our CSV file

              // Lets construct our importer
              $csv_importer = new CsvFileImporter();

              // Import our csv file
              if ($csv_importer->import($csv_file)) {
                  // Provide success message to the user
                  $message = 'Seu arquivo foi importado com sucesso!';
              } else {
                  $message = 'Seu arquivo não pôde ser importado!';
              }

          } else {
              // Provide a meaningful error message to the user
              // Perform any logging if necessary
              $message = 'O arquivo deve possuir o formato .csv.';
          }

          return Redirect::back()->with('message', $message);
      }
  }
}
