<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $govlink  = array(
            [
                'link' => 'http://presidencia.gov.co',
                'name' => 'Presidencia',
                'altname' => 'Sitio web de Presidencia'
            ],
            [
                'link' => 'http://www.mininterior.gov.co/',
                'name' => 'MinInterior',
                'altname' => 'Sitio web del Ministerio del Interior'
            ],
            [
                'link' => 'http://www.mincit.gov.co/',
                'name' => 'MinComercio',
                'altname' => 'Sitio web del Ministerio de Comercio'
            ],
            [
                'link' => 'http://www.minambiente.gov.co',
                'name' => 'MinAmbiente',
                'altname' => 'Sitio web del Ministerio de Ambiente'
            ],
            [
                'link' => 'http://www.mintrabajo.gov.co/',
                'name' => 'MinTrabajo',
                'altname' => 'Sitio web del Ministerio de Trbajo'
            ],
            [
                'link' => 'http://www.vicepresidencia.gov.co',
                'name' => 'Vicepresidencia',
                'altname' => 'Sitio web de Vicepresidencia'
            ],
            [
                'link' => 'http://www.cancilleria.gov.co/',
                'name' => 'MinRelaciones',
                'altname' => 'Sitio web del Ministerio de Relaciones'
            ],
            [
                'link' => 'http://www.mintic.gov.co/',
                'name' => 'MinTic',
                'altname' => 'Sitio web del Ministerio de Las Tecnologías de la información'
            ],
            [
                'link' => 'https://www.mintransporte.gov.co/',
                'name' => 'MinTransporte',
                'altname' => 'Sitio web del Ministerio de Transporte'
            ],
            [
                'link' => 'https://www.minsalud.gov.co',
                'name' => 'MinSalud',
                'altname' => 'Sitio web de del Ministerio de Salud'
            ],
            [
                'link' => 'http://www.minjusticia.gov.co/',
                'name' => 'MinJusticia',
                'altname' => 'Sitio web del Ministerio de Justicia'
            ],
            [
                'link' => 'http://www.minhacienda.gov.co',
                'name' => 'MinHacienda',
                'altname' => 'Sitio web del Ministerio de Hacienda'
            ],
            [
                'link' => 'http://www.mincultura.gov.co',
                'name' => 'MinCultura',
                'altname' => 'Sitio web de del Ministerio de Cultura'
            ],
            [
                'link' => 'http://www.minvivienda.gov.co/',
                'name' => 'MinVivienda',
                'altname' => 'Sitio web del Ministerio de Vivienda'
            ],
            [
                'link' => 'http://www.urnadecristal.gov.co/',
                'name' => 'Urna de Cristal',
                'altname' => 'Sitio web Urna de Cristal'
            ],
            [
                'link' => 'https://www.mindefensa.gov.co',
                'name' => 'MinDefensa',
                'altname' => 'Sitio web del Ministerio de Defensa'
            ],
            [
                'link' => 'https://www.minenergia.gov.co/',
                'name' => 'MinEnergia',
                'altname' => 'Sitio web del Ministerio de Minas'
            ],
            [
                'link' => 'https://www.minagricultura.gov.co/',
                'name' => 'MinAgricultura',
                'altname' => 'Sitio web del Ministerio de Agricultura'
            ],
            [
                'link' => 'http://www.mineducacion.gov.co',
                'name' => 'MinEducación',
                'altname' => 'Sitio web del Ministerio de Educación'
            ] 
        );
        return view('layouts.guest', compact('govlink'));
    }
}
