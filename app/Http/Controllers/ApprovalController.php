<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX APPROVAL
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $approvals = Approval::with([

                'booking.vehicle',
                'booking.driver',
                'booking.user',
                'approver'

            ])
            ->where('approver_id', auth()->id())
            ->latest()
            ->get();

        return view('approvals.index', compact('approvals'));
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE BOOKING
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $approval = Approval::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE APPROVAL SEKARANG
        |--------------------------------------------------------------------------
        */

        $approval->update([

            'status' => 'approved',

            'approved_at' => now()

        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK APPROVAL LEVEL BERIKUTNYA
        |--------------------------------------------------------------------------
        */

        $nextApproval = Approval::where(
                'booking_id',
                $approval->booking_id
            )
            ->where(
                'level',
                $approval->level + 1
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | JIKA ADA LEVEL BERIKUTNYA
        |--------------------------------------------------------------------------
        */

        if ($nextApproval) {

            $nextApproval->update([

                'status' => 'pending'

            ]);

        } else {

            /*
            |--------------------------------------------------------------------------
            | JIKA SEMUA APPROVAL SUDAH SELESAI
            |--------------------------------------------------------------------------
            */

            $approval->booking->update([

                'status' => 'approved'

            ]);

            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS VEHICLE
            |--------------------------------------------------------------------------
            */

            if ($approval->booking->vehicle) {

                $approval->booking->vehicle->update([

                    'status' => 'used'

                ]);
            }
        }

        return back()->with(

            'success',

            'Booking berhasil disetujui'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT BOOKING
    |--------------------------------------------------------------------------
    */

    public function reject($id)
    {
        $approval = Approval::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE APPROVAL
        |--------------------------------------------------------------------------
        */

        $approval->update([

            'status' => 'rejected',

            'approved_at' => now()

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE BOOKING
        |--------------------------------------------------------------------------
        */

        $approval->booking->update([

            'status' => 'rejected'

        ]);

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STATUS VEHICLE
        |--------------------------------------------------------------------------
        */

        if ($approval->booking->vehicle) {

            $approval->booking->vehicle->update([

                'status' => 'available'

            ]);
        }

        return back()->with(

            'success',

            'Booking berhasil ditolak'

        );
    }
}