<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;

class TenantCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    protected $domain;
    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Empresa Registrada - Bienvenido',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $tenant = Tenant::find($this->domain);
        $data = DB::select('SELECT * FROM '.$tenant->tenancy_db_name.'.users');

        return new Content(
            view: 'emails.tenant',
            with: [
                'domain' => $this->domain,
                'email'  => $data[0]->email,
                'pass'   => $data[0]->remember_token,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
