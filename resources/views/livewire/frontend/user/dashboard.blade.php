<div>
    @section('title')
        <title>Dashboard</title>
    @endsection
    <div class="dashboard-header">
        <h1 class="dashboard-title">Dashboard</h1>
        <div class="user-info">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
            <span>John Doe</span>
        </div>
    </div>
    @if($pendingMode)
         <div class="dashboard-cards">
            <div class="card">
                <div class="user-header">
                    <div class="user-avatar">{{ substr(auth()->user()->first_name, 0, 1) }}{{ substr(auth()->user()->last_name, 0, 1) }}</div>
                    <div>
                        <div class="user-name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        <div class="user-id">ID: {{auth()->user()->unique_id}}</div>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-wallet"></i> Balance</span>
                    <span class="info-value">{{auth()->user()->balance}}</span>
                </div>

                <a href="#" class="btn btn-outline btn-sm">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-3xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="m18 8 4 4-4 4-1.41-1.41L18.17 13H13v-2h5.17l-1.59-1.59L18 8zM7 1.01 17 1c1.1 0 2 .9 2 2v4h-2V6H7v12h10v-1h2v4c0 1.1-.9 2-2 2H7c-1.1 0-2-.9-2-2V3c0-1.1.9-1.99 2-1.99zM7 21h10v-1H7v1zM7 4h10V3H7v1z"></path></svg>
                    Balance Transfer
                </a>

                <div class="card-divider"></div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-status"></i> Status</span>
                    <span class="status-active">{{auth()->user()->status}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-calendar-alt"></i> Member Since</span>
                    <span class="info-value">{{date('M j, Y', strtotime(auth()->user()->created_at))}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-gift"></i> Referral Code</span>
                    <span class="referral-code">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="card-actions">
                    <a href="#" class="btn btn-outline btn-sm">
                        <i class="fas fa-copy"></i> Copy My Referral Code
                    </a>
                    <a href="#" class="btn btn-success btn-sm">
                        <i class="fas fa-unlock"></i> Account Activate
                    </a>
                    <a href="#" class="btn btn-info btn-sm">
                        <i class="fas fa-link"></i> Copy My Referral Link
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                    <div class="card-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-user"></i> Full Name</span>
                    <span class="info-value">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-envelope"></i> Email</span>
                    <span class="info-value">{{auth()->user()->email}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-phone"></i> Contact No</span>
                    <span class="info-value">{{auth()->user()->whatsapp_number}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-globe"></i> Country</span>
                    <span class="info-value">{{auth()->user()->country}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-language"></i> Language</span>
                    <span class="info-value">{{auth()->user()->language}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-id-card"></i> Student ID</span>
                    <span class="info-value">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-id-badge"></i> ID</span>
                    <span class="info-value">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-file-alt"></i> Reference No</span>
                    <span class="info-value">{{auth()->user()->reference_no}}</span>
                </div>
            </div>
        </div>
    @else
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enrolled Courses</h3>
                    <div class="card-icon">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="card-value">12</div>
                <p class="card-text">Total courses you're enrolled in</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Completed Courses</h3>
                    <div class="card-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="card-value">7</div>
                <p class="card-text">Courses you've successfully completed</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hours Spent</h3>
                    <div class="card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="card-value">48</div>
                <p class="card-text">Total learning hours this month</p>
            </div>
        </div>

        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">My Courses</h2>
            </div>
            <div class="course-list">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8d2ViJTIwZGV2ZWxvcG1lbnR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Web Development" class="course-img">
                    <div class="course-content">
                        <h3 class="course-title">Web Development Bootcamp</h3>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 65%;"></div>
                        </div>
                        <div class="course-stats">
                            <span>65% Complete</span>
                            <span>12/18 Lessons</span>
                        </div>
                    </div>
                </div>

                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8ZGF0YSUyMGFuYWx5dGljc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Data Analytics" class="course-img">
                    <div class="course-content">
                        <h3 class="course-title">Data Analytics Mastery</h3>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 30%;"></div>
                        </div>
                        <div class="course-stats">
                            <span>30% Complete</span>
                            <span>6/20 Lessons</span>
                        </div>
                    </div>
                </div>

                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZGlnaXRhbCUyMG1hcmtldGluZ3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Digital Marketing" class="course-img">
                    <div class="course-content">
                        <h3 class="course-title">Digital Marketing Strategies</h3>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 80%;"></div>
                        </div>
                        <div class="course-stats">
                            <span>80% Complete</span>
                            <span>16/20 Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Recent Activity</h2>
            </div>
            <div class="activity-list">
                <div class="activity-item" style="display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #e2e8f0;">
                    <div style="background: #4c84ff; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1rem; margin-bottom: 5px;">Started new lesson</h3>
                        <p style="color: #64748b; font-size: 0.9rem;">Web Development - Chapter 5: JavaScript Fundamentals</p>
                        <p style="color: #94a3b8; font-size: 0.8rem;">2 hours ago</p>
                    </div>
                </div>

                <div class="activity-item" style="display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #e2e8f0;">
                    <div style="background: #10b981; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1rem; margin-bottom: 5px;">Completed quiz</h3>
                        <p style="color: #64748b; font-size: 0.9rem;">Digital Marketing - Week 3 Assessment</p>
                        <p style="color: #94a3b8; font-size: 0.8rem;">1 day ago</p>
                    </div>
                </div>

                <div class="activity-item" style="display: flex; align-items: center; padding: 15px;">
                    <div style="background: #f59e0b; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1rem; margin-bottom: 5px;">Earned certificate</h3>
                        <p style="color: #64748b; font-size: 0.9rem;">Data Analytics - Basic Certificate</p>
                        <p style="color: #94a3b8; font-size: 0.8rem;">3 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        // Simple animation for card elements
        document.addEventListener('DOMContentLoaded', function() {
            const infoItems = document.querySelectorAll('.info-item');

            infoItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';

                setTimeout(() => {
                    item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</div>
