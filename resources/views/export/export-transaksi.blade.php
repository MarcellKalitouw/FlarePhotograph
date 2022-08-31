                    <table>
                       <thead>
                           <tr>
                               <th style="5%" >Nomor</th>
                               <th style="10%">Nama Pemesan</th>
                               <th style="15%">Tanggal Kegiatan</th>
                               <th style="15%">Nama Event (Produk)</th>
                               <th style="10%">Biaya Tambahan</th>
                               <th style="10%">Total Harga</th>
                               <th style="10%">Keterangan Pembayaran</th>
                               <th style="15%">Created at</th>
                               {{-- <th>Deleted at</th> --}}
                               
                           </tr>
                       </thead>
                       
                       <tbody>
                           <?php
                           $no = 0;
                           ?>
                           
                           @forelse ($transaksiLaporan as $item)

                           <tr>
                               <td>{{$no+=1}}</td>  
                               <td>
                                    {{ $item->nama_pelanggan}} <br>
                                    {{ $item->no_telp }} <br>
                                    {{ $item->email_pelanggan }}
                                </td>  
                               <td>
                                    {{$item->tgl_booking}}
                                    {{$item->jam_booking }}
                                </td>
                               <td >
                                    <ul>
                                        
                                    @foreach ($item->detail_transaksi as $dt)
                                        <li>{{ $dt->nama_produk }} <br>
                                        harga : Rp.{{ number_format($dt->harga, 0) }} <br>
                                        varian : Rp.{{ number_format($dt->harga_varian, 0) }} <br>
                                        Total ( Rp.{{ number_format($dt->harga + ($dt->harga_varian ? $dt->harga_varian : 0))  }} )
                                        </li>
                                    @endforeach
                                    </ul>
                               </td>
                               <td>Rp.{{number_format($item->biaya_tambahan, 0)}}</td>
                               <td>Rp.{{number_format($item->total_transaksi, 0)}}</td>
                               <td>{{$item->bentuk_pembayaran}}</td>
                               <td>{{$item->created_at}}</td>
                               {{-- <td>{{$item->updated_at}}</td>
                               <td>{{$item->deleted_at}}</td> --}}
                              
                               
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center">
                                        <strong> 
                                            Tidak ada data
                                        </strong>
                                    </td>
                                </tr>
                            @endforelse
                           
                       </tbody>
                   </table>