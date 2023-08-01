<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisisAhc extends CI_Controller
{

    public function index()
    {
        echo 'Bismillah Perhitungan AHC<br>';
        $nama = array('Ade', 'Ahmad', 'Andi', 'Andalas', 'Anto', 'Budiman', 'Darkim', 'Dinar', 'Fia', 'Hidayat');
        $recency = array('4', '3', '3', '4', '2', '4', '4', '1', '4', '1');
        $frequency = array('33', '11', '11', '29', '12', '19', '39', '23', '8', '6');
        $monetary = array(
            '229840000',
            '65425600',
            '70610200',
            '172435300',
            '59517200',
            '144360300',
            '306691400',
            '136498300',
            '26935800',
            '44531700'
        );
        $vr = array();
        $vf = array();
        $vm = array();
        $d = array();
        for ($i = 0; $i < sizeof($nama); $i++) {
            // echo '| ' . $nama[$i];
            // echo '| ' . $recency[$i];
            // echo '| ' . $frequency[$i];
            // echo '| ' . $monetary[$i];


            if ($recency[$i] == '4') {
                $vr[] = '4';
            } else if ($recency[$i] == '3') {
                $vr[] = '3';
            } else if ($recency[$i] == '2') {
                $vr[] = '2';
            } else if ($recency[$i] == '1') {
                $vr[] = '1';
            }

            if ($frequency[$i] > '10') {
                $vf[] = '4';
            } else if ($frequency[$i] >= '7' && $frequency[$i] <= '9') {
                $vf[] = '3';
            } else if ($frequency[$i] >= '4' && $frequency[$i] <= '6') {
                $vf[] = '2';
            } else if ($frequency[$i] < '4') {
                $vf[] = '1';
            }

            if ($monetary[$i] > '100000000') {
                $vm[] = '4';
            } else if ($monetary[$i] >= '50000000' && $monetary[$i] <= '100000000') {
                $vm[] = '3';
            } else if ($monetary[$i] >= '5000000' && $monetary[$i] <= '50000000') {
                $vm[] = '2';
            } else if ($monetary[$i] < '50000000') {
                $vm[] = '1';
            }
        }

        $no = 1;
        for ($j = 1; $j <= sizeof($vr); $j++) {
            for ($k = 1; $k <= sizeof($vf); $k++) {
                // echo $no++;
                // echo '| B000' . $j . ' | B000' . $k;
                // echo '<br>';
                // echo $vr[$j - 1] . '|' . $vr[$k - 1] . ' + ' . $vf[$j - 1] . '|' . $vf[$k - 1] . ' + ' . $vm[$j - 1] . ' | ' . $vm[$k - 1];
                // echo '<br>';
                //perhitungan rumus euclidean
                $d[] = round(sqrt(pow($vr[$j - 1] - $vr[$k - 1], 2) + pow($vf[$j - 1] - $vf[$k - 1], 2) + pow($vm[$j - 1] - $vm[$k - 1], 2)), 2);
                $nod[] = $j . $k;
            }
        }

        $matriks = array();
        for ($p = 0; $p < sizeof($nod); $p++) {

            // echo $nod[$p] . ' | ';
            // echo $d[$p];

            $matriks[] = array($nod[$p], 'nilai' => $d[$p]);

            // echo '<br>';
        }
        var_dump($matriks);
        $min = min($matriks);
        echo $min;
    }
}

/* End of file cAnalisisAhc.php */
