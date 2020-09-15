<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class HomeController extends Controller
{
    public function __construct()
    {
        $theloai = DB::table('theloai')->get();

        $i = 0;
        foreach ($theloai as $value)
        {
            $theloai[$i]->loaitin = DB::table('loaitin')->where('idTheLoai',$value->id)->get();
            $i++;
        }
        view()->share('theloai',$theloai);


        $tins = DB::table('tintuc')->get();
        foreach ($tins as $value) {
            DB::table('tintuc')->where('id',$value->id)->update([
                'SoLuotXem' => rand(50,300)
            ]);
            
        }
    }

    public function home()
    {
        $toppost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                    //->inRandomOrder()
                    ->limit(3)
                    ->get();

        $lastpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                    // ->where('SoLuotXem','<','200')
                    ->orderBy('tintuc.id','ASC')
                    ->limit(6)
                    ->get();


        $highlightpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                         ->orderBy('SoLuotXem','ASC')
                        ->limit(4)
                        ->get();

        $popularpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                        ->where('SoLuotXem','>','20')
                        ->orderBy('tintuc.id','ASC')
                        ->limit(5)
                        ->get();

        $mostpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                    ->where('SoLuotXem','<','250')
                    ->orderBy('tintuc.id','DESC')
                    ->limit(3)
                    ->get();

        return view('pages.home',compact('toppost','lastpost','highlightpost','popularpost','mostpost'));
    }

    public function loaitin($slug)
    {
        $loaitin = DB::table('loaitin')->where('TenKhongDau',$slug)->first();

        if(!$loaitin)
            return abort(404);

        $listnew = DB::table('tintuc')
                    ->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                    ->where('idLoaiTin',$loaitin->id)
                    ->paginate(10);

        $highlightpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->orderBy('SoLuotXem','ASC')
            ->limit(4)
            ->get();

        $popularpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->where('SoLuotXem','>','20')
            ->orderBy('tintuc.id','ASC')
            ->limit(5)
            ->get();

        return view('pages.loaitin',compact('loaitin','listnew','highlightpost','popularpost'));
    }

    public function chitiet($slug)
    {

        $post = DB::table('tintuc')
                ->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
                ->where('tintuc.TieuDeKhongDau',$slug)
                ->first();
        $tintuc = DB::table('tintuc')->where('TieuDeKhongDau',$slug)->first();

        if(!$post)
            return abort(404);


        $highlightpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->orderBy('SoLuotXem','ASC')
            ->limit(4)
            ->get();

        $popularpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->where('SoLuotXem','>','20')
            ->orderBy('tintuc.id','ASC')
            ->limit(5)
            ->get();


        $comment = DB::table('comment')
                ->select('comment.*','users.name')
                ->join('users','users.id','=','comment.idUser')
                ->where('idTinTuc',$tintuc->id)->get();

        return view('pages.chitiet',compact('post','highlightpost','popularpost','comment'));
    }


    public function dangnhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data))
            return redirect('/');
        else
        {
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
            return redirect('/dang-nhap');
        }

    }

    public function dangky()
    {
        return view('pages.dangky');
    }

    public function postDangky(Request $request)
    {
        $this->validate($request,[
            'email' => 'bail|required|email|min:6|max:50|unique:users',
            'name' => 'bail|required|min:3|max:50',
            'password' => 'bail|required|min:6|max:20|confirmed',
            'password_confirmation' => 'bail|required'

        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải từ 6 kí tự trở lên',
            'password.max' => 'Mật khẩu quá dài',
            'password.confirmed'=> 'Mật khẩu nhập lại không chính xác',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.min' => 'Họ tên phải từ 3 kí tự trở lên',
            'name.max' => 'Họ tên quá dài',
            'password_confirmation.required' => 'Nhập lại mật khẩu'
        ]);


        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'quyen' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        return redirect()->back()->with('message','Đăng ký thành công');
    }

    public function dangxuat()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }
    }

    public function comment(Request $request)
    {
        if(!Auth::check())
        {
            Session::flash('error', 'loi');
            return redirect()->back();
        }

        $tin = DB::table('tintuc')->where('TieuDeKhongDau',$request->slug)->first();

        $this->validate($request,[
            'comment' => 'bail|required',
        ],[
            'comment.required' => 'Bạn chưa nhập comment',
        ]);

        DB::table('comment')->insert([
            'idUser' => Auth::user()->id,
            'IdTinTuc' => $tin->id,
            'NoiDung' => $request->comment,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back();

    }

    public function xoacmt($id)
    {
        if(Auth::check())
        {
            DB::table('comment')->where('id',$id)->delete();
            return redirect()->back();
        }

    }

    public function timkiem()
    {
        if(isset($_GET['key']))
            $key = $_GET['key'];
        else
            return abort(404);

        $listnew = DB::table('tintuc')
            ->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->where('TieuDe','like','%'.$key.'%')
            ->paginate(10);


        $highlightpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->orderBy('SoLuotXem','ASC')
            ->limit(4)
            ->get();

        $popularpost = DB::table('tintuc')->join('loaitin','loaitin.id','=','tintuc.idLoaiTin')
            ->where('SoLuotXem','>','700')
            ->orderBy('tintuc.id','ASC')
            ->limit(5)
            ->get();

        return view('pages.timkiem',compact('highlightpost','popularpost','listnew'));

    }
}
