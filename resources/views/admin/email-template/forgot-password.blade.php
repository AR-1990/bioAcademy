@extends('admin.email-template.layout.master')
@section('content')

<center>
		<table width="100%" border="0" cellspacing="0" cellpadding="0"
			style="margin: 0; padding: 0; width: 100%; height: 100%;" bgcolor="#f4ecfa" class="gwfw">
			<tbody>
				<tr>
					<td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">
						<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
							<tbody>
								<tr>
									<td class="td"
										style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td class="mpx-10">
														<!-- Top -->
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tbody>
																<tr>
																	<td class="text-12 c-grey l-grey a-right py-20"
																		style="font-size:12px; line-height:16px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; color:#6e6e6e; text-align:right; padding-top: 20px; padding-bottom: 20px;">
																		<a href="#" target="_blank" class="link c-grey"
																			style="text-decoration:none; color:#6e6e6e;"><span
																				class="link c-grey"
																				style="text-decoration:none; color:#6e6e6e;">View
																				this
																				email in your browser</span></a>
																	</td>
																</tr>
															</tbody>
														</table> <!-- END Top -->

														<!-- Container -->
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tbody>
																<tr>
																	<td class="pt-10"
																		style="border-radius: 10px 10px 0 0; padding-top: 10px;"
																		bgcolor="#e55123">
																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tbody>
																				<tr>
																					<td style="border-radius: 10px 10px 0 0;"
																						bgcolor="#ffffff">
																						<!-- Logo -->
																						<table width="100%" border="0"
																							cellspacing="0"
																							cellpadding="0"
																							bgcolor="#fff"
																							style="margin-bottom: 20px;">
																							<tbody>
																								<tr>
																									<td class="img-center p-30 px-15"
																										style="font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;">
																										<a href="#"
																											target="_blank"><img
																												src="{{asset("email-template-assets/logo.png")}}"
																												width="300"
																												height="50"
																												border="0"
																												alt=""></a>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																						<!-- Logo -->

																						<!-- Main -->
																						<table width="100%" border="0"
																							cellspacing="0"
																							cellpadding="0">
																							<tbody>
																								<tr>
																									<td class="px-50 mpx-15"
																										style="padding-left: 50px; padding-right: 50px;">
																										<!-- Section - Intro -->
																										<table
																											width="100%"
																											border="0"
																											cellspacing="0"
																											cellpadding="0">
																											<tbody>
																												<tr>
																													<td class="pb-50"
																														style="padding-bottom: 50px;">
																														<table
																															width="100%"
																															border="0"
																															cellspacing="0"
																															cellpadding="0">
																															<tbody>
																																<tr>
																																	<td class="fluid-img img-center pb-50"
																																		style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 30px; padding-top: 30px; margin-top: 20px;">
																																		<img src="{{asset("email-template-assets/user-signup.png")}}"
																																			width="250"
																																			height="250"
																																			border="0"
																																			alt="">
																																	</td>
																																</tr>
																																<tr>
																																	<td class="title-36 a-center pb-15"
																																		style="font-size:36px; line-height:40px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px; padding-top: 15px; ">
																																		<strong>
																																			Your Temporary Password
																																		</strong>
																																	</td>
																																</tr>
																					
																																<tr>
																																	<td align="center"
																																		style="font-size:22px; color:#111111; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center; padding-bottom: 10px; padding-top: 10px;">
													
																																		<span
																																			style="color: #e55123; font-size: 30px; display: inline-block; border: 1px solid #2828284d; padding: 10px 20px; line-height: 50px; font-weight: 800;">
																																			{{$password}}</span>
																																		
																																	</td>
																																</tr>
																																<tr>
																																	<td align="center">

																																		<!-- Button -->
																																		<table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px; margin-top: 10px; margin-bottom: 10px;">
																																			<tbody>
																																				<tr>
																																					<td class="btn-16 c-white l-white" bgcolor="#e55123" style="font-size:16px; line-height:20px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">
																																						<a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
																																						<a href="https://biopharmaacademy.com/login" target="_blank">	<span class="link c-white" style="text-decoration:none; color:#ffffff;">login from Here</span></a>
																																						</a>
																																					</td>
																																				</tr>
																																			</tbody>
																																		</table>
																																		<!-- END Button -->
																																	</td>
																																</tr>
																																<tr>
																																	<td class="py-4"
																																		style="padding-top: 10px;">
																																		<table
																																			width="100%"
																																			border="0"
																																			cellspacing="0"
																																			cellpadding="0">
																																			<tbody>
																																				<tr>
																																					<td class="title-26 a-center pb-35"
																																						style="font-size:18px; line-height:30px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 10px;">
																																						<strong>Need
																																							help?
																																							Contact
																																							Biopharma Academy
																																							support</strong>
																																					</td>
																																				</tr>



																																			</tbody>
																																		</table>
																																	</td>
																																</tr>
																																<tr>
																																	<td>
																																	</td>
																																</tr>
																															</tbody>
																														</table>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																										<!-- END Section - Intro -->


																									</td>
																								</tr>
																							</tbody>
																						</table>
																						<!-- END Main -->
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<!-- END Container -->

														<!-- Footer -->
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tbody>
																<tr>
																	<td class="p-50 mpx-15" bgcolor="#1c3866"
																		style="border-radius: 0 0 10px 10px; padding: 50px;">
																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tbody>
																				<tr>
																					<td class="text-14 lh-24 a-center c-white l-white pb-20"
																						style="font-size:14px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">
																						19255 PARK ROW #205
																						HOUSTON, TX 77084
																						<br>
																						<a href="tel:+2819443610																						"
																							target="_blank"
																							class="link c-white"
																							style="text-decoration:none; color:#ffffff;"><span
																								class="link c-white"
																								style="text-decoration:none; color:#ffffff;">(281) 944-3610

																							</span></a>

																						<br>
																						<a href="mailto:info@biopharmauniversity.com"
																							target="_blank"
																							class="link c-white"
																							style="text-decoration:none; color:#ffffff;"><span
																								class="link c-white"
																								style="text-decoration:none; color:#ffffff;">info@biopharmauniversity.com</span></a>
																						- <a href="https://university.biopharmainfo.net/"
																							target="_blank"
																							class="link c-white"
																							style="text-decoration:none; color:#ffffff;"><span
																								class="link c-white"
																								style="text-decoration:none; color:#ffffff;">www.biopharmaacademy.com</span></a>
																					</td>
																				</tr>
																				
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table> <!-- END Footer -->

														<!-- Bottom -->
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tbody>
																<tr>
																	<td class="text-12 lh-22 a-center c-grey- l-grey py-20"
																		style="font-size:12px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 22px; text-align:center; padding-top: 20px; padding-bottom: 20px;">
																		<a href="#" target="_blank" class="link c-grey"
																			style="text-decoration:none; color:#6e6e6e;"><span
																				class="link c-grey"
																				style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">UNSUBSCRIBE</span></a>
																		&nbsp;|&nbsp; <a href="#" target="_blank"
																			class="link c-grey"
																			style="text-decoration:none; color:#6e6e6e;"><span
																				class="link c-grey"
																				style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">WEB
																				VERSION</span></a> &nbsp;|&nbsp; <a
																			href="#" target="_blank" class="link c-grey"
																			style="text-decoration:none; color:#6e6e6e;"><span
																				class="link c-grey"
																				style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">SEND
																				TO A FRIEND</span></a>
																	</td>
																</tr>
															</tbody>
														</table> <!-- END Bottom -->
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</center>

@endsection