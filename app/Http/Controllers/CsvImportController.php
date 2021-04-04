<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvImportController extends Controller
{
    public function store(Request $request)
    {
        // setlocaleを設定
        setlocale(LC_ALL, 'ja_JP.UTF-8');
    
        // アップロードしたファイルを取得
        // 'csv_file' はCSVファイルインポート画面の inputタグのname属性
        $uploaded_file = $request->file('csv_file');
    
        // アップロードしたファイルの絶対パスを取得
        $file_path = $request->file('csv_file')->path($uploaded_file);
    
        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV);
    
        $row_count = 1;
        foreach ($file as $row)
        {
            // 1行目のヘッダーは取り込まない
            if ($row_count > 1)
            {
                $id = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                $name = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                $age = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
    
                var_dump($id);
                var_dump($name);
                var_dump($age);
    
                // ここで値をデータベースに保存したりする
    
            }
            $row_count++;
        }
    }
}
