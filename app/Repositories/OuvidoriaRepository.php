<?php

namespace App\Repositories;

use App\Utils\Common;
use App\Utils\ImagemUtil;
use App\Utils\OuvidoriaPdf;
use Carbon\Carbon;

/**
 * Class OuvidoriaRepository.
 */
class OuvidoriaRepository
{
    /**
     * @return array
     * @throws \Exception
     */
    public function pdfMock()
    {
        $file = new OuvidoriaPdf('P','mm','A4');
        $file->SetCreator('eOUV', true);
        $file->SetFont('Times','B',12);
        $file->AddPage();
        $file->ln(10);

        $file->SetFont('Times','B',14);
        $file->setFillColor(230,230,230);
        $file->Cell(190,10,utf8_decode('Obrigado pela sua participação!'), 0 ,10, 'L');

        $file->SetFont('Times','',12);
        $file->Cell(190,10,utf8_decode('Para acompanhar o andamento da sua manifestação, anote e guarde o número de protocolo a seguir:'), 0 ,5, 'L');

        $file->SetFont('Times','',12);
        $file->Cell(190,10,utf8_decode('SEU NÚMERO DE PROTOCOLO: 3102020.00000019/2019-13'), 0 ,1, 'L');

        $file->SetFont('Times','',12);
        $file->Cell(190,2,utf8_decode('E-MAIL UTILIZADO: 3102020.00000019/2019-13'), 0 ,1, 'L');

        $file->SetLineWidth(0.5);
        $file->Line(10,60,190,60);

        $file->ln(10);

        $file->SetFont('Times','B',12);
        $file->Cell(190,10,utf8_decode('PARA CONSULTAR SUA MANIFESTAÇÃO:'), 0 ,2, 'L');

        $file->ln(5);

        $file->SetFont('Times','B',12);
        $file->Cell(190,0,utf8_decode('Cidadão sem cadastro no sistema'), 0 ,0, 'L');

        $file->ln(5);

        $file->SetFont('Times','B',12);
        $file->Cell(190,0,utf8_decode('Informe o número do protocolo e o e-mail informado acima.'), 0 ,1, 'L');


        $file->ln(10);

        $file->SetFont('Times','B',12);
        $file->Cell(190,0,utf8_decode('Cidadão cadastrado:'), 0 ,1, 'L');

        $file->ln(5);

        $file->SetFont('Times','',12);
        $file->Cell(190,0,utf8_decode('Acesso o sistema (com seu usuário e senha) e consulte todas as manifestações que você cadastrou no sistema'), 0 ,1, 'L');

        $caminho = storage_path('app/public/tmp/') . md5(microtime()) . '.pdf';

        $file->Output($caminho, 'F');

        if(!file_exists($caminho)){
            Common::setError('Houve um erro ao gerar o arquivo!');
        }

        $urlBase64 = (new ImagemUtil($caminho))->getUrlBase64();

        return ['success' => 1, 'arquivo' => $urlBase64];
    }
}
