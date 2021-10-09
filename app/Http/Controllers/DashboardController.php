<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $today = date('d'); //ambil tgl sekarang
        $todaymonth = date('m'); //ambil bulan sekarang
        $todayyear = date('Y'); //ambil tahun sekarang
        // $todaycomplete = date('Y-m-d');
        $dt = date("m", strtotime("-1 month")); //ambil bulan sebelumnya
        $yt = date("Y",strtotime("-1 year")); //ambil tahun sebelumnya
        $number1 = cal_days_in_month(CAL_GREGORIAN, $todaymonth, $todayyear); //ambil tgl bulan ini
        $array = [];
        $array1 = [];
        for($i=1;$i<=$number1;$i++){
            array_push($array1, $i); //membuat array tgl bulan ini untuk di legend chart
        }

        $number = cal_days_in_month(CAL_GREGORIAN, $dt, $todayyear); //ambil tgl bulan lalu
        for($i=1;$i<=$number;$i++){
            array_push($array, $i); //membuat array tgl bulan lalu untuk di legend chart
        }

        // ambil data bulan ini
        $resulttables2temp = $this->getPerusahaanCurrMonth($todaymonth, $todayyear, $today);
        $resulttables2 = json_encode($resulttables2temp);

        // ambil data bulan lalu
        $resulttables1temp = $this->getPerusahaanCurrMonth($dt, $todayyear, $number);
        $resulttables1 = json_encode($resulttables1temp);

        // selisih perusahaan bulan lalu dan bulan ini
        $selisihperusahaan = $this->getSelisihPerusahaan($todaymonth, $todayyear, $dt);

        // cari jumlah hari ini
        $count_date_now = $this->getTotalPerusahaanToday($resulttables2temp, $today);

        // data perusahaan hari ini
        $perusahaan = $this->getDataPerusahaanCurrDay();

        // pie jumlah perusahaan berdasarkan jenis paket
        $pieperusahaan = $this->getPiePerusahaan();

        // pie jumlah karyawan berdasarkan jenis paket
        $piekaryawan = $this->getPieKaryawan();

        // total tugas proyek
        $totalProjectTask = $this->getTotalProjectTask();

        // data harian feedback
        $dataharianfeedbackline = $this->getDataHarianFeedback();
        $dataharianfeedbackline = json_encode($dataharianfeedbackline);

        // pie jumlah feedback tiap kategori
        $countfeedbackkategori = $this->getCountDataFeedback();
        $countfeedbackkategori = json_encode($countfeedbackkategori);

        // data tabel feedback lengkap
        $datafeedback = $this->getDataFeedback();
        // $datafeedback = json_encode($datafeedback);

        // jumlah feedback hari ini
        $feedbacktoday = $this->getFeedbackToday();

        // jumlah feedback yang terselesaikan
        $feedbacksolved = $this->getFeedbackSolved();



        return view('dashboard',
            [
                'resultables' => $resulttables1,
                'resultables1' => $resulttables2,
                'count_now' => $count_date_now,
                'perusahaan' => $perusahaan,
                'pieperusahaan' => $pieperusahaan,
                'piekaryawan' => $piekaryawan,
                'selisihperusahaan' => $selisihperusahaan,
                'totalprojecttask' => $totalProjectTask,
                'dataharianfeedbackline' => $dataharianfeedbackline,
                'countfeedbackkategori' => $countfeedbackkategori,
                'datafeedback' => $datafeedback,
                'feedbacktoday' => $feedbacktoday,
                'feedbacksolved' => $feedbacksolved
            ] );
    }


    public function getPerusahaanPrevMonth($dt, $todayyear, $number)
    {
        $tables = DB::select("SELECT DAY(createdate) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM msperusahaan WHERE MONTH(createdate)=$dt AND YEAR(createdate)=$todayyear GROUP BY DAY(createdate) ORDER BY DAY(createdate) asc");
        $arrayvalue = [];
        foreach($tables as $table)
        {
            $createdate[] = $table->tahun_bulan;
            $jumlah_harian[] = $table->jumlah_bulanan;
        }

        for($x=1;$x<=$number;$x++)
        {
            if(isset($createdate))
            {
                $temp_index = array_search($y, $createdate);
                if($temp_index === false)
                {
                    array_push($arrayvalue, array('tgl'=>$x, 'value'=>'0'));
                } else {
                    array_push($arrayvalue, array('tgl'=>$x, 'value'=>$jumlah_harian[$temp_index]));
                }
            } else {
                array_push($arrayvalue, array('tgl'=>$x, 'value'=>'0'));
            }
        }

        return $arrayvalue;
    }


    public function getSelisihPerusahaan($todaymonth, $todayyear, $dt)
    {
        $dt1 = $dt;
        $tables = DB::select("SELECT COUNT(*) AS jumlah_bulanan FROM msperusahaan WHERE MONTH(createdate)=$dt1 AND YEAR(createdate)=$todayyear");
        foreach($tables as $table)
        {
            $createdateprev = $table->jumlah_bulanan;
        }
        if(isset($createdateprev))
        {
            $createdateprev = $createdateprev;
        }

        $tables1 = DB::select("SELECT COUNT(*) AS jumlah_bulanan FROM msperusahaan WHERE MONTH(createdate)=$todaymonth AND YEAR(createdate)=$todayyear");
        foreach($tables1 as $table1)
        {
            $createdatenow = $table1->jumlah_bulanan;
        }
        if(isset($createdatenow))
        {
            $createdatenow = $createdatenow;
        } else {
            $createdatenow = 0;
        }

        $selisih = $createdatenow - $createdateprev;
        if($selisih < 0){
            $outselisih = "<span class='text-danger mr-2'><i class='fa fa-arrow-down'></i> " . abs($selisih) . "</span>";
        } else {
            $outselisih = "<span class='text-success mr-2'><i class='fa fa-arrow-up'></i> " . abs($selisih) . "</span>";
        }
        return $outselisih;
    }


    public function getPerusahaanCurrMonth($todaymonth, $todayyear, $today)
    {
        $tables1 = DB::select("SELECT DAY(createdate) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM msperusahaan WHERE MONTH(createdate)=$todaymonth AND YEAR(createdate)=$todayyear GROUP BY DAY(createdate) ORDER BY DAY(createdate) asc");
        $arrayvalue1 = [];
        foreach($tables1 as $table1)
        {
            if(isset($table1)){
                $createdatenow[] = $table1->tahun_bulan;
                $jumlah_harian_now[] = $table1->jumlah_bulanan;
            } else {
                $createdatenow[] = null;
                $jumlah_harian_now[] = null;
                break;
            }

        }

        for($y=1;$y<=$today;$y++)
        {
            if(isset($createdatenow))
            {
                $temp_index1 = array_search($y, $createdatenow);
                if($temp_index1 === false)
                {
                    array_push($arrayvalue1, array('tgl'=>$y, 'value'=>'0'));
                } else {
                    array_push($arrayvalue1, array('tgl'=>$y, 'value'=>$jumlah_harian_now[$temp_index1]));
                }
            } else {
                array_push($arrayvalue1, array('tgl'=>$y, 'value'=>'0'));
            }

        }

        return $arrayvalue1;
    }


    public function getDataPerusahaanCurrDay()
    {
        $tables2 = DB::select("SELECT convert(varchar, a.CreateDate, 8) as jam, a.perusahaan, a.alamat, a.PICPerusahaan, b.NamaPaket FROM msperusahaan as a, MsAdmDaftarHarga as b where a.TotalLic=b.Id and convert(varchar, a.CreateDate, 23)=convert(varchar, getdate(), 23) ORDER BY convert(varchar, a.CreateDate, 8) ASC");
        $perusahaanTemp=[];
        $i=0;
        foreach($tables2 as $table2)
        {
            $perusahaanTemp[$i] = array('jam'=>$table2->jam, 'nama'=>$table2->perusahaan, 'jml'=>$table2->alamat, 'pic'=>$table2->PICPerusahaan, 'lic'=>$table2->NamaPaket);
            $i++;
        }

        return $perusahaanTemp;
    }

    public function getTotalPerusahaanToday($resulttables2temp, $today)
    {
        if(isset($resulttables2temp))
        {
            $temp_date_now = array_search($today, $resulttables2temp);
            if($temp_date_now === false){
                $count_date_now = "0";
            } else {
                $count_date_now = $resulttables2temp['value'];
            }
        } else {
            $count_date_now = "0";
        }

        return $count_date_now;
    }

    public function getPiePerusahaan()
    {
        $tables1 = DB::select("SELECT b.namapaket, COUNT(a.TotalLic) as jumlah FROM  dbo.MsPerusahaan a , dbo.MsAdmDaftarHarga b WHERE a.TotalLic = b.Id GROUP BY b.NamaPaket");

        foreach($tables1 as $table1)
        {

            $createdate1c[] = array('namapaket'=>$table1->namapaket, 'jumlah'=>$table1->jumlah);

        };

        $assocarray = json_encode($createdate1c);
        return $assocarray;
    }

    public function getPieKaryawan()
    {
        $tables2 = DB::select("SELECT b.namapaket, COUNT(c.Id) as jumlahkaryawan FROM  dbo.MsPerusahaan a , dbo.MsAdmDaftarHarga b , dbo.MsPerusahaanKaryawan c WHERE a.TotalLic = b.Id and a.Id = c.PerusahaanId and c.aktif=1 GROUP BY b.NamaPaket");

        foreach($tables2 as $table2)
        {

            $createdate2c[] = array('namapaket'=>$table2->namapaket, 'jumlahkaryawan'=>$table2->jumlahkaryawan);

        };

        $assocarray2 = json_encode($createdate2c);
        return $assocarray2;
    }

    public function getTotalProjectTask (){
        $tables3 = DB::select("SELECT count(isproject) as jumlahTugas FROM dbo.TransKumpulanTugasKaryawanHD where IsDeleted=0 AND IsProject=1 group by IsProject");
        foreach($tables3 as $table3)
        {
            $totalTaskProject = $table3->jumlahTugas;
        }
        return $totalTaskProject;
    }

    public function getDataHarianFeedback(){
        $tables = DB::select("SELECT CONVERT(date, a.CreateDate) as CreateDate, COUNT(*) as jumlah FROM dbo.MsAdmFeedback a, dbo.MsPerusahaanKaryawan b, dbo.MsPerusahaan c, dbo.MsAdmKategoriFeedBack d WHERE a.KaryawanId = b.Id AND b.PerusahaanId = c.Id AND d.Id = a.KategoriId group by CONVERT(date, a.CreateDate) order by CONVERT(date, a.CreateDate) asc;");
        foreach($tables as $table)
        {
            $dataharian[] = array('createdate'=>$table->CreateDate, 'jumlah'=>$table->jumlah);
        }
        return $dataharian;
    }

    public function getCountDataFeedback(){
        $tables = DB::select("SELECT d.NamaInd, COUNT(*) as jumlah FROM dbo.MsAdmFeedback a, dbo.MsPerusahaanKaryawan b, dbo.MsPerusahaan c, dbo.MsAdmKategoriFeedBack d WHERE a.KaryawanId = b.Id AND b.PerusahaanId = c.Id AND d.Id = a.KategoriId group by d.NamaInd;");
        foreach($tables as $table)
        {
            $datafeedback[] = array('jenis'=>$table->NamaInd, 'jumlah'=>$table->jumlah);
        }
        return $datafeedback;
    }

    public function getDataFeedback(){
        $tables = DB::select("SELECT CONVERT(date, a.CreateDate) as CreateDate,
                        d.NamaInd kategori,
                        c.Perusahaan,
                        b.NamaDepan,
                        b.NamaBelakang,
                        b.Username,
                        b.Phone,
                        b.Email,
                        a.Keterangan,
                        a.Solved,
                        a.SolvedDate
                FROM dbo.MsAdmFeedback a,
                    dbo.MsPerusahaanKaryawan b,
                    dbo.MsPerusahaan c,
                    dbo.MsAdmKategoriFeedBack d
                WHERE a.KaryawanId = b.Id
                    AND b.PerusahaanId = c.Id
                    AND d.Id = a.KategoriId
                ORDER BY CONVERT(date, a.CreateDate) desc;");

        foreach($tables as $table)
        {
            $datafeedback[] = array(
                'createdate' => $table->CreateDate,
                'kategori' => $table->kategori,
                'perusahaan' => $table->Perusahaan,
                'namadepan' => $table->NamaDepan,
                'namabelakang' => $table->NamaBelakang,
                'username' => $table->Username,
                'phone' => $table->Phone,
                'email' => $table->Email,
                'keterangan' => $table->Keterangan,
                'solved' => $table->Solved,
                'solveddate' => $table->SolvedDate
            );
        }
        return $datafeedback;
    }

    public function getFeedbackToday()
    {
        $tables = DB::select("SELECT count(*) AS jumlah FROM MsAdmFeedback WHERE convert(varchar, CreateDate, 23)=convert(varchar, getdate(), 23);");
        foreach($tables as $table)
        {
            $datafeedbacktoday = $table->jumlah;
        }
        return $datafeedbacktoday;
    }

    public function getFeedbackSolved()
    {
        $tables = DB::select("SELECT count(*) AS jumlah FROM MsAdmFeedback WHERE Solved IS NOT NULL;");
        foreach($tables as $table)
        {
            $datafeedbacksolved = $table->jumlah;
        }
        return $datafeedbacksolved;
    }
}
