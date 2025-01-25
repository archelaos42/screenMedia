<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Booking;
use App\Models\Campaign;
use App\Models\Week;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use stdClass;
use function PHPUnit\Framework\isEmpty;

class PagesController extends Controller
{
    /**
     * Displays the welcome page.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Home');
//        dd($products);
    }

    /**
     * Displays the boards page.
     *
     * @return \Inertia\Response
     */
    public function boards()
    {
        $boards = Board::all();
        return Inertia::render('Boards', compact('boards'));
//        dd($products);
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function campaigns()
    {
        $campaigns = Campaign::query()->where('status', '=','active')->get();
        return Inertia::render('Campaigns', compact('campaigns'));
//        dd($products);
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function archive(Request $request)
    {
        $id = $request->input('campaign');
        $campaign = Campaign::findOrFail($id);
        $campaign->status = "archived";
        $campaign->save();
        $bookings = Booking::query()->where('campaign_id', '=', $id)->get();
        foreach ($bookings as $booking){
            $booking->status = "archived";
            $booking->save();
        }
        return \redirect()->back()->with('message', 'Campaign archived successfully!');
    }
    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function activate(Request $request)
    {
        $id = $request->input('campaign');
        $campaign = Campaign::findOrFail($id);
        $campaign->status = "active";
        $campaign->save();
        $bookings = Booking::query()->where('campaign_id', '=', $id)->get();
        foreach ($bookings as $booking){
            $booking->status = "active";
            $booking->save();
        }
        return \redirect()->back()->with('message', 'Campaign activated successfully!');
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function campaign($id)
    {

        $campaign = Campaign::findOrFail($id);
//        $boards = Board::with('bookings')->get();
//        dd($boards);

        $bookings = Booking::query()->where('campaign_id', '=', $id)->get();
        $boards = new ArrayObject(array());

        foreach ($bookings as $booking){
            $board = Board::findOrFail($booking->board_id);
            $boards->append([
                'id' => $board->id,
                'code' => $board->code,
                'type' => $board->type,
                'address' => $board->address,
                'googlelink' => $board->googlelink,
                'image' => $board->image,
            ]);
        }


        return Inertia::render('Campaign', compact('campaign', 'boards'));
//        dd($products);
    }

//    /**
//     * Displays a campaign page meant for clients.
//     *
//     * @return \Inertia\Response
//     */
//    public function pubcampaign($id)
//    {
//
//        $campaign = Campaign::findOrFail($id);
////        $boards = Board::with('bookings')->get();
////        dd($boards);
//
//        $bookings = Booking::query()->where('campaign_id', '=', $id)->get();
//        $boards = new ArrayObject(array());
//
//        foreach ($bookings as $booking){
//            $board = Board::findOrFail($booking->board_id);
//            $boards->append([
//                'id' => $board->id,
//                'code' => $board->code,
//                'type' => $board->type,
//                'address' => $board->address,
//                'googlelink' => $board->googlelink,
//                'image' => $board->image,
//            ]);
//        }
//
//
//        return Inertia::render('PubCampaign', compact('campaign', 'boards'));
////        dd($products);
//    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function populate($id)
    {
        $campaign = Campaign::findOrFail($id);
        $bookings = Booking::all();
        $boards = new ArrayObject(array());
        $allBoards = Board::all();

        foreach ($allBoards as $board){
            $booking = Booking::query()->where('board_id', '=', $board->id)->first();

            if (!$booking){
                    $boards->append([
                    'id' => Board::query()->where('code', '=', $board->code)->first()->id,
                    'code' => $board->code,
                    'address' => $board->address,
                    'googlelink' => $board->googlelink,
                    'image' => $board->image,
                    'start' => $campaign->start,
                    'end' => $campaign->end,
                    'campaignId' => 'empty',
                ]);
            }



        }

        foreach ($bookings as $booking){

            if ($booking->campaign_id === $campaign->id) {
                $board = Board::findOrFail($booking->board_id);
                $boards->append([
                    'id' => Board::query()->where('code', '=', $board->code)->first()->id,
                    'start' => $campaign->start,
                    'end' => $campaign->end,
                    'code' => $board->code,
                    'address' => $board->address,
                    'googlelink' => $board->googlelink,
                    'image' => $board->image,
                    'bookingId' => $booking->id,
                    'campaignId' => $booking->campaign_id,
                ]);
            } else {
                if(!($booking->start <= $campaign->start && $booking->end >= $campaign->end)) {
                    $b = Booking::query()->where('campaign_id', '=', $campaign->id)->where('board_id', '=', $booking->board_id)->first();
                    if(!$b){

                        $board = Board::findOrFail($booking->board_id);
                        $boards->append([
                            'id' => Board::query()->where('code', '=', $board->code)->first()->id,
                            'start' => $campaign->start,
                            'end' => $campaign->end,
                            'code' => $board->code,
                            'address' => $board->address,
                            'googlelink' => $board->googlelink,
                            'image' => $board->image,
                            'campaignId' => 'free',
                        ]);
                    }
                }
            }
        }
//        dd($boards);
        return Inertia::render('Populate', compact('campaign', 'boards', 'bookings'));

    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function add(Request $request)
    {
//        dd($request);
//        $allBoards = Board::with('bookings')->get();
//        dd($allBoards);
//        $boardId = $request->input('board');
//        $campaignId = $request->input('campaign');
        $booking = new booking;
        $booking->board_id = $request->input('board');
        $booking->campaign_id = $request->input('campaign');
        $booking->status = 'active';
        $booking->start = $request->input('start');
        $booking->end = $request->input('end');
//        dd($request);
//        $board = Board::find($id);
//        $board->campaign = $request->input('campaign');
//        $board = new board;
//        $campaign = $request->input('campaign');
//        $campaign->totalprice += $board->price;
        $booking->save();
//        return url('campaigns/populate/1');
        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function remove(Request $request)
    {
        $id = $request->input('booking');
        $booking = Booking::findorFail($id);
        $booking->delete();
        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function newcampaign()
    {
        $nfStart = new Carbon('next monday');
        $start = $nfStart->format('Y-m-d');
        $end = $nfStart->addWeek()->format('Y-m-d');
//        $dude = $start->format('d-m-Y H:i:s');
//        dd($dude);
//        $today->format('Y-m-d H:i:s');
//        dd($today->format('d-m-Y H:i:s'));
        return Inertia::render('NewCampaign', compact('start', 'end'));
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function newcampaignpost(Request $request)
    {
        $campaign = new campaign;
        $campaign->name= $request->input('name');
        $campaign->status= 'active';
        $campaign->start= $request->input('start');
        $campaign->end= $request->input('end');
        $campaign->save();
        return \redirect()->back()->with('message', 'Campaign created successfully!');
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function newboard()
    {
        return Inertia::render('NewBoard');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function newboardpost(Request $request)
    {

        $image = $request->file('image');
        $code = $request->input('code');

        if ($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $code . '.' . $extension;
            $image->storeAs('/public/images', $filename);
        } else {
            $filename = null;
        }

        $board = new board;
        $board->code= $request->input('code');
        $board->type= $request->input('type');
        $board->address= $request->input('location');
        $board->googlelink= $request->input('google');
        $board->image= $filename;
        $board->save();
        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function boardedit($id)
    {
        $board = Board::findOrFail($id);
        $image = Storage::disk('public')->get('images/'.$board->image);


//        $curimage = asset('storage/images/'.$board->image);
//        $curimage = file(@('storage/images/'.$board->image));
//        dd($curimage);
//        $content = Storage::get('images/333714.webp');
//        $orders = Storage::json('333714.webp');
//        dd($content);
//        dd($board);

//        $path = @('storage/images/'.$board->image);
//        $file = File::get($path);
//        $type = File::mimeType($path);
//        $response = Response::make($file);
//        $response->header("Content-Type", $type);
//        return $response;


        return Inertia::render('BoardEdit', compact('board'));
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function boardchange(Request $request)
    {
//        dd($request);
        $code = $request->input('code');
        $image = $request->file('image');

        if ($request->file('image')){
            $board = Board::query()->where('code', '=', $code)->first();
//            dd($board);
            if(file_exists($board->image)){
                Storage::disk('public')->delete('images/'.$board->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $code . '.' . $extension;
            $image->storeAs('/public/images', $filename);
        } else {
            $filename = null;
        }
        $board = Board::findOrFail($request->id);
        $board->code= $request->input('code');
        $board->type= $request->input('type');
        $board->address= $request->input('address');
        $board->googlelink= $request->input('google');
        $board->image= $filename;
        $board->update();
        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function archived()
    {
        $campaigns = Campaign::query()->where('status', '=', 'archived')->get();
        return Inertia::render('Archived', compact('campaigns'));
//        dd($products);
    }

    /**
     * Displays the campaigns page.
     *
     * @return \Inertia\Response
     */
    public function campaignedit($id)
    {
        $campaign = Campaign::findOrFail($id);
        $nfStart = new Carbon('today');
        $start = $nfStart->format('Y-m-d');
        $end = $nfStart->addWeek()->format('Y-m-d');
        $ogStart = $campaign->start;
        $ogEnd = $campaign->end;
//        dd($board);
        return Inertia::render('CampaignEdit', compact('campaign', 'start', 'end', 'ogStart', 'ogEnd'));
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function campaignchange(Request $request)
    {
        $campaign = Campaign::findOrFail($request->id);

        if(!(strtotime($request->input('start')) === strtotime($campaign->start))
            or !(strtotime($request->input('end')) === strtotime($campaign->end))){
            $bookings = Booking::all();
            foreach ($bookings as $booking){
                if($booking->campaign_id === $campaign->id){
                    $booking->delete();
                }

            }
        }
        $campaign->name= $request->input('name');
        $campaign->start= $request->input('start');
        $campaign->end= $request->input('end');
        $campaign->update();
        return \redirect()->back()->with('message', 'Item added successfully!');
    }


    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function campaigndestroy($id)
    {
        $campaign = Campaign::findOrFail($id);
//        $boards = Board::query()->where('campaign', '=', $id)->get();
        $bookings = Booking::query()->where('campaign_id', '=', $id);
        foreach ($bookings as $booking){
            $booking->delete();
        }
        $campaign->delete();
        return to_route('campaigns');
//        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function boarddestroy($id)
    {
        $board = Board::findOrFail($id);
//        Storage::delete($board->image);
//        unlink($board->image);
        Storage::disk('public')->delete('images/'.$board->image);
//        dd($board->image);
        $board->delete();
        return to_route('boards');
//        return \redirect()->back()->with('message', 'Item added successfully!');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function cms()
    {
        $boards = Board::all();
        $bookings = Booking::with('campaign')->get();
        $timeslots = new ArrayObject(array());

        for ($i = 0; $i < 52; $i++){
            $today = new Carbon();

            if ($today->dayOfWeek == Carbon::MONDAY)
                $start = $today;
            else
                $start = new Carbon('last monday');

            if ($today->dayOfWeek == Carbon::SUNDAY)
                $end = $today;
            else
                $end = new Carbon('next sunday');
            $timeslots->append([
                'start' => $start->addWeek($i)->format('Y-m-d'),
                'end' => $end->addWeek($i)->format('Y-m-d'),
                'weekNo' => $start->weekOfYear,
                'test' => $i,
            ]);

        };

        return Inertia::render('Cms', compact('boards', 'bookings',  'timeslots', ));
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function admin()
    {
        return Inertia::render('Admin');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function downloadFiles()
    {
        return Storage::disk('public')->download('kat.pdf');
    }

    public function locations()
    {
        return Inertia::render('Locations');
    }

    public function OOH()
    {
        return Inertia::render('OOH');
    }

    public function mediatypes()
    {
        return Inertia::render('MediaTypes');
    }

    /**
     * Displays the campaigns-populate page.
     *
     * @return \Inertia\Response
     */
    public function imageremove($id)
    {
        $board = Board::findOrFail($id);
        Storage::disk('public')->delete('images/'.$board->image);
        $board->image = null;
        $board->update();

//        return to_route('boards');
        return \redirect()->back()->with('message', 'Item added successfully!');
    }

}
