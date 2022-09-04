# Platform
- id
- name string
- logo image
- domain string nullable
- api_token string nullable

# User
- id
- platform_id Platform
- platform_ref string nullable
- name string
- email string nullable
- phone string nullable

# Department
- id
- platform_id Platform
- name string

# Service
- id
- platform_id Platform
- platform_ref string nullable
- user_id User
- name string

# Ticket
- id
- platform_id Platform
- department_id Deparment
- user_id User
- service_id Service nullable
- title text
- note nullable (Adminler icin)
- created_by User
- status 

# TicketMessage
- id
- ticket_id Ticket
- user_id User
- type enum [CUSTOMER,CLIENT,BOT,CUSTOM]
- message text
- created_at timestamp

# Category
- id
- platform_id Platform
- name string ['Üyelik', 'Sipariş', 'Ödeme']
- created_by User

# Questions
- id
- platform_id Platform
- category_id Category
- question string
- content text
- created_by User

# Announcement
- id
- platform_id Platform
- title string
- description text
- started_at timestamp
- finished_at timestamp
- created_by User
