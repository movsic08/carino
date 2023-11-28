<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    public function viewAuditTrail()
    {
        $auditTrail = Audit::latest()->paginate(10);

        return view('admin.audit-trail.show', compact('auditTrail'));
    }
}
