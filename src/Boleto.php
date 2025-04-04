<?php

use Dompdf\Dompdf;
use OpenBoleto\Agente;
use OpenBoleto\Banco\Bradesco;

$sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
$cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');
$boleto = new Bradesco(array(
  'dataVencimento' => new DateTime('2013-01-01'),
  'valor' => 10.50,
  'sequencial' => 123456789,
  'sacado' => $sacado,
  'cedente' => $cedente,
  'agencia' => 1172,
  'carteira' => 6,
  'conta' => 0403005,
  'contaDv' => 2,
  'agenciaDv' => 1,
  'carteiraDv' => 1,
  'descricaoDemonstrativo' => array(
    'Compra de materiais cosméticos',
    'Compra de alicate',
  ),
  'instrucoes' => array(
    'Após o dia 30/11 cobrar 2% de mora e 1% de juros ao dia.',
    'Não receber após o vencimento.',
  ),
));
$html = $boleto->getOutput();
$css = '<style>
@page {
  size: A4 !important;
  margin: 0 !important;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
}
</style>';

$html = $css . $html;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("boleto.pdf", array("Attachment" => false));
