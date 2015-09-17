I use standard check_snmp nagios plugin for getting metrics from Mikrotik router and custom pnp4nagios templates for getting beauty graphs.

I defined following commands to work with my mikrotik router:

ROM Usage:

```
define command{
        command_name    check_mikrotik_disk
        command_line    $USER1$/check_snmp -4 -H $HOSTADDRESS$ -P 2c -C $ARG1$ -o .1.3.6.1.2.1.25.2.3.1.6.131072,.1.3.6.1.2.1.25.2.3.1.5.131072 --label="used(kb),total(kb)" -D ", " -w $ARG2$ -c $ARG3$
        }
```

Memory Usage:

```
define command{
        command_name    check_mikrotik_mem
        command_line    $USER1$/check_snmp -4 -H $HOSTADDRESS$ -P 2c -C $ARG1$ -o .1.3.6.1.2.1.25.2.3.1.6.65536,.1.3.6.1.2.1.25.2.3.1.5.65536 --label="used(kb),total(kb)" -D ", " -w $ARG2$ -c $ARG3$
        }
```

Interface Traffic:
```
define command{
        command_name    check_mikrotik_iftraffic
        command_line    $USER1$/check_snmp -4 -H $HOSTADDRESS$ -P 2c -C $ARG1$ -o .1.3.6.1.2.1.31.1.1.1.6.$ARG2$,.1.3.6.1.2.1.31.1.1.1.10.$ARG2$ --label="in, out" -D ", " --rate -w $ARG3$ -c $ARG4$
        }
```
where $ARG2$ - interface number.
