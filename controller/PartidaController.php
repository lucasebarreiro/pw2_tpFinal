<?php

class PartidaController
{
    private $presenter;
    private $model;

    public function __construct($model, $presenter)
    {
        $this->presenter = $presenter;
        $this->model = $model;
    }

    public function get()
    {
        session_start();
        $pregunta = $this->model->traerPreguntaAleatoria();
        /*yo traia el ['id'] pero me tiraba error google y dice que tenes
        que acceder al [0] para que te traiga el id de la primera consulta
        */
        $respuestas = $this->model->traerRespuestasDesordenadas($pregunta[0]['id']);

        $this->presenter->render("view/partida.mustache", ['pregunta' => $pregunta, 'respuestas' => $respuestas]);
    }

}
