<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Vite;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class UsersExport implements
    FromQuery,
    Responsable,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    WithDrawings,
    WithCustomStartCell
{
    use Exportable;

    protected $users;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query()->whereIn('id', $this->users);
    }

    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Full Name',
            'Email Address',
            'Mobile',
            'Registered At',
            'Last Login At',
        ];
    }

    /**
     * @param mixed $user
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->first_name . ' ' . $user->last_name,
            $user->email,
            $user->mobile,
            $user->created_at,
            $user->last_login_at,
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            },
        ];
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName(config(appName()) .' Logo');
        $drawing->setDescription(config(appName()) .' Logo');
        $drawing->setPath(resource_path('images/opengraph/og-image.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    /**
     * @return string
     */
    public function startCell(): string
    {
        return 'A20';
    }
}
