<?php

namespace App\DataTables;

use App\Classroom;
use Yajra\Datatables\Services\DataTable;


class ClassroomDataTables extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('name', function($classroom){
                return $classroom->name;
            })
            ->addColumn('time-zone', function($classroom){
                $arr = array("-12"=>"(GMT-12:00) International Date Line West",
                    "-11"=>"(GMT-11:00) Midway Island, Samoa",
                    "-10"=>"(GMT-10:00) Hawaii",
                    "-9"=>"(GMT-09:00) Alaska",
                    "-8"=>"(GMT-08:00) Pacific Time (US &amp; Canada)",
                    "-8"=>"(GMT-08:00) Tijuana, Baja California",
                    "-7"=>"(GMT-07:00) Arizona",
                    "-7"=>"(GMT-07:00) Chihuahua, La Paz, Mazatlan",
                    "-7"=>"(GMT-07:00) Mountain Time (US &amp; Canada)",
                    "-6"=>"(GMT-06:00) Central America",
                    "-6"=>"(GMT-06:00) Central Time (US &amp; Canada)",
                    "-6"=>"(GMT-06:00) Guadalajara, Mexico City, Monterrey",
                    "-6"=>"(GMT-06:00) Saskatchewan",
                    "-5"=>"(GMT-05:00) Bogota, Lima, Quito, Rio Branco",
                    "-5"=>"(GMT-05:00) Eastern Time (US &amp; Canada)",
                    "-5"=>"(GMT-05:00) Indiana (East)",
                    "-4"=>"(GMT-04:00) Atlantic Time (Canada)",
                    "-4"=>"(GMT-04:00) Caracas, La Paz",
                    "-4"=>"(GMT-04:00) Manaus",
                    "-4"=>"(GMT-04:00) Santiago",
                    "-3.5"=>"(GMT-03:30) Newfoundland",
                    "-3"=>"(GMT-03:00) Brasilia",
                    "-3"=>"(GMT-03:00) Buenos Aires, Georgetown",
                    "-3"=>"(GMT-03:00) Greenland",
                    "-3"=>"(GMT-03:00) Montevideo",
                    "-2"=>"(GMT-02:00) Mid-Atlantic",
                    "-1"=>"(GMT-01:00) Cape Verde Is.",
                    "-1"=>"(GMT-01:00) Azores",
                    "0"=>"(GMT+00:00) Casablanca, Monrovia, Reykjavik",
                    "0"=>"(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London",
                    "1"=>"(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna",
                    "1"=>"(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague",
                    "1"=>"(GMT+01:00) Brussels, Copenhagen, Madrid, Paris",
                    "1"=>"(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb",
                    "1"=>"(GMT+01:00) West Central Africa",
                    "2"=>"(GMT+02:00) Amman",
                    "2"=>"(GMT+02:00) Athens, Bucharest, Istanbul",
                    "2"=>"(GMT+02:00) Beirut",
                    "2"=>"(GMT+02:00) Cairo",
                    "2"=>"(GMT+02:00) Harare, Pretoria",
                    "2"=>"(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius",
                    "2"=>"(GMT+02:00) Jerusalem",
                    "2"=>"(GMT+02:00) Minsk",
                    "2"=>"(GMT+02:00) Windhoek",
                    "3"=>"(GMT+03:00) Kuwait, Riyadh, Baghdad",
                    "3"=>"(GMT+03:00) Moscow, St. Petersburg, Volgograd",
                    "3"=>"(GMT+03:00) Nairobi",
                    "3"=>"(GMT+03:00) Tbilisi",
                    "3.5"=>"(GMT+03:30) Tehran",
                    "4"=>"(GMT+04:00) Abu Dhabi, Muscat",
                    "4"=>"(GMT+04:00) Baku",
                    "4"=>"(GMT+04:00) Yerevan",
                    "4.5"=>"(GMT+04:30) Kabul",
                    "5"=>"(GMT+05:00) Yekaterinburg",
                    "5"=>"(GMT+05:00) Islamabad, Karachi, Tashkent",
                    "5.5"=>"(GMT+05:30) Sri Jayawardenapura",
                    "5.5"=>"(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi",
                    "5.75"=>"(GMT+05:45) Kathmandu",
                    "6"=>"(GMT+06:00) Almaty, Novosibirsk",
                    "6"=>"(GMT+06:00) Astana, Dhaka",
                    "6.5"=>"(GMT+06:30) Yangon (Rangoon)",
                    "7"=>"(GMT+07:00) Bangkok, Hanoi, Jakarta",
                    "7"=>"(GMT+07:00) Krasnoyarsk",
                    "8"=>"(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi",
                    "8"=>"(GMT+08:00) Kuala Lumpur, Singapore",
                    "8"=>"(GMT+08:00) Irkutsk, Ulaan Bataar",
                    "8"=>"(GMT+08:00) Perth",
                    "8"=>"(GMT+08:00) Taipei",
                    "9"=>"(GMT+09:00) Osaka, Sapporo, Tokyo",
                    "9"=>"(GMT+09:00) Seoul",
                    "9"=>"(GMT+09:00) Yakutsk",
                    "9.5"=>"(GMT+09:30) Adelaide",
                    "9.5"=>"(GMT+09:30) Darwin",
                    "10"=>"(GMT+10:00) Brisbane",
                    "10"=>"(GMT+10:00) Canberra, Melbourne, Sydney",
                    "10"=>"(GMT+10:00) Hobart",
                    "10"=>"(GMT+10:00) Guam, Port Moresby",
                    "10"=>"(GMT+10:00) Vladivostok",
                    "11"=>"(GMT+11:00) Magadan, Solomon Is., New Caledonia",
                    "12"=>"(GMT+12:00) Auckland, Wellington",
                    "12"=>"(GMT+12:00) Fiji, Kamchatka, Marshall Is.",
                    "13"=>"(GMT+13:00) Nuku'alofa");
                return $arr[$classroom->timezone];
            })
//            ->addColumn('teacher', function($classroom){
//                return $classroom->teacher->user->user_name;
//            })
            ->addColumn('number_of_student', function($classroom){
                return $classroom->no_of_student;
            })
            ->addColumn('created_at',function($classroom){
                if(!empty($classroom->created_at)){
                    return $classroom->created_at->diffForHumans();
                }else{
                    return '';
                }
            })
            ->addColumn('action',function($classrooms){
                return '<a href="'. route('classroom.edit', $classrooms['id']) .'" style="float: left;width:20px;"><i class="glyphicon glyphicon-edit" data-name="classrooms" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update classrooms"></i></a> <form action="'. route('classroom.destroy', $classrooms['id']) .'" method="POST" id="form-id-'. $classrooms['id'] .'" style="width: 2%;display: inline-block;position: relative;"> <input type="hidden" name="_method" value="DELETE"/> <input type="hidden" name="_token" value="{{ csrf_token() }}" /> <a onclick="document.getElementById('."'form-id-". $classrooms['id']."'".').submit();"><i class="glyphicon glyphicon-trash" data-name="category-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Category"></i></a> </form>';
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        
        $query = Classroom::with('user','teacher');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters(['responsive'=> 'true',]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'time-zone',
//            'teacher',
            'expire_date',
            'number_of_student',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'classroomdatatables_' . time();
    }
}
