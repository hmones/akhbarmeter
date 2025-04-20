<h2>Contact information:</h2>
<p>Name: {{data_get($data, 'firstName')}} {{data_get($data, 'secondName')}}</p>
<p>Email: {{data_get($data, 'email', 'None')}}</p>
<p>Phone: {{data_get($data, 'phone', 'None')}}</p>
<p>Page Url: {{data_get($data, 'pageUrl', 'None')}}</p>
<br/>
<hr/>
<h2>Message:</h2>
<p>{{data_get($data, 'message', 'None')}}</p>
