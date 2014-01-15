<?php

class Frame_IPv4_Protocol
{

    const HOPOPT        = 0;

    const ICMP          = 1;
    
    const IGMP          = 2;

    const  GGP          = 3;

    const  IP           = 4;

    const  Stream       = 5;

    const  TCP          = 6;

    const  CBT          = 7;

    const  EGP          = 8;

    const  IGP          = 9;

    const  BBNRCCMON  = 10;

    const  NVPII       = 11;

    const  PUP          = 12;

    const  ARGUS        = 13;

    const  EMCON        = 14;

    const  XNET         = 15;

    const  CHAOS        = 16;

    const  UDP          = 17;
/*
    const  [[Multiplexverfahren|Multiplexing]] =  18 ;
    const  DCN-MEAS (DCN Measurement Subsystems) =  19 ;
    const  HMP (Host Monitoring) =  20 ;
    const  PRM (Packet Radio Measurement) =  21 ;
    const  XNS-IDP (XEROX NS IDP) =  22 ;
    const  TRUNK-1 =  23 ;
    const  TRUNK-2 =  24 ;
    const  LEAF-1 =  25 ;
    const  LEAF-2 =  26 ;
    const  [[Reliable Data Protocol|RDP]] (Reliable Data Protocol) =  27 ;
    const  [[Internet Reliable Transaction Protocol|IRTP]] (Internet Reliable Transaction Protocol) =  28 ;
    const  ISO-TP4 (ISO Transport Protocol Class 4) =  29 ;
    const  NETBLT (Bulk Data Transfer Protocol) =  30 ;
    const  MFE-NSP (MFE Network Services Protocol) =  31 ;
    const  MERIT-INP (MERIT Internodal Protocol) =  32 ;
    const  [[Datagram Congestion Control Protocol|DCCP]] (Datagram Congestion Control Protocol) =  33 ;
    const  3PC (Third Party Connect Protocol) =  34 ;
    const  IDPR (Inter-Domain Policy Routing Protocol) =  35 ;
    const  XTP =  36 ;
    const  [[Datagram Delivery Protocol|DDP]] (Datagram Delivery Protocol) =  37 ;
    const  IDPR-CMTP (IDPR Control Message Transport Proto) =  38 ;
    const  TP++ (TP++ Transport Protocol) =  39 ;
    const  IL (IL Transport Protocol) =  40 ;
    const  Verkapselung von [[IPv6]]- in [[IPv4]]-Pakete =  41 ;
    const  SDRP (Source Demand Routing Protocol) =  42 ;
    const  IPv6-Route (Routing Header for [[IPv6]]) =  43 ;
    const  IPv6-Frag (Fragment Header for [[IPv6]]) =  44 ;
    const  IDRP (Inter-Domain Routing Protocol) =  45 ;
    const  RSVP (Reservation Protocol) =  46 ;
    const  [[Generic Routing Encapsulation Protocol|GRE]] (Generic Routing Encapsulation) =  47 ;
    const  MHRP (Mobile Host Routing Protocol) =  48 ;
    const  BNA =  49 ;
    const  [[Encapsulating Security Payload|ESP]] (Encapsulating Security Payload) =  50 ;
    const  [[IPSec#Authentication Header (AH)|AH]] (Authentication Header) =  51 ;
    const  I-NLSP (Integrated Net Layer Security  TUBA) =  52 ;
    const  SWIPE (IP with Encryption) =  53 ;
    const  NARP (NBMA Address Resolution Protocol) =  54 ;
    const  MOBILE (IP Mobility) =  55 ;
    const  TLSP (Transport Layer Security Protocol) =  56 ;
    const  SKIP =  57 ;
    const  [[Internet Control Message Protocol V6|IPv6-ICMP]] (ICMP for [[IPv6]]) =  58 ;
    const  IPv6-NoNxt (Kein nächster [[Header]] für [[IPv6]]) =  59 ;
    const  IPv6-Opts (Destination Options for [[IPv6]]) =  60 ;
    const  Jedes [[Host (Informationstechnik)|Host]]-interne Protokoll =  61 ;
    const  CFTP =  62 ;
    const  Jedes lokale Netz =  63 ;
    const  SAT-EXPAK (SATNET and Backroom EXPAK) =  64 ;
    const  KRYPTOLAN  =  65 ;
    const  RVD (MIT Remote Virtual Disk Protocol) =  66 ;
    const  IPPC (Internet Pluribus Packet Core) =  67 ;
    const  Jedes verteilte Dateisystem =  68 ;
    const  SAT-MON (SATNET Monitoring) =  69 ;
    const  VISA =  70 ;
    const  IPCV (Internet Packet Core Utility) =  71 ;
    const  CPNX (Computer Protocol Network Executive) =  72 ;
    const  CPHB (Computer Protocol Heart Beat) =  73 ;
    const  WSN (Wang Span Network) =  74 ;
    const  PVP (Packet Video Protocol) =  75 ;
    const  BR-SAT-MON (Backroom SATNET Monitoring) =  76 ;
    const  SUN-ND (SUN ND PROTOCOL-Temporary) =  77 ;
    const  WB-MON (WIDEBAND Monitoring) =  78 ;
    const  WB-EXPAK (WIDEBAND EXPAK) =  79 ;
    const  ISO-IP (ISO [[Internet Protocol]]) =  80 ;
    const  VMTP =  81 ;
    const  SECURE-VMTP =  82 ;
    const  VINES =  83 ;
    const  [[Time-Triggered Protocol|TTP]] =  84 ;
    const  NSFNET-IGP (NSFNET-[[Interior Gateway Protocol|IGP]]) =  85 ;
    const  DGP (Dissimilar Gateway Protocol) =  86 ;
    const  TCF =  87 ;
    const  EIGRP =  88 ;
    const  [[Open Shortest Path First|OSPF]] =  89 ;
    const  Sprite-RPC (Sprite [[Remote Procedure Call|RPC]] Protocol) =  90 ;
    const  LARP (Locus Address Resolution Protocol) =  91 ;
    const  MTP (Multicast Transport Protocol) =  92 ;
    const  [[AX.25]] (AX.25 Frames) =  93 ;
    const  IPIP (IP-within-IP Encapsulation Protocol) =  94 ;
    const  MICP (Mobile Internetworking Control Pro.) =  95 ;
    const  SCC-SP (Semaphore Communications Sec. Pro.) =  96 ;
    const  ETHERIP (Ethernet-within-IP Encapsulation) =  97 ;
    const  ENCAP (Encapsulation Header) =  98 ;
    const  Jeder private Verschlüsselungsentwurf =  99 ;
    const  GMTP =  100 ;
    const  IFMP (Ipsilon Flow Management Protocol) =  101 ;
    const  PNNI (over [[Internet Protocol|IP]]) =  102 ;
    const  PIM (Protocol Independent Multicast) =  103 ;
    const  ARIS =  104 ;
    const  SCPS =  105 ;
    const  [[QNX]] =  106 ;
    const  A/N (Active Networks) =  107 ;
    const  IPComp (IP Payload Compression Protocol) =  108 ;
    const  SNP (Sitara Networks Protocol) =  109 ;
    const  Compaq-Peer (Compaq Peer Protocol) =  110 ;
    const  IPX-in-IP ([[Internetwork Packet Exchange|IPX]] in [[Internet Protocol|IP]]) =  111 ;
    const  VRRP (Virtual Router Redundancy Protocol) =  112 ;
    const  PGM (PGM Reliable Transport Protocol) =  113 ;
    const  any 0-hop protocol =  114 ;
    const  L2TP (Layer Two Tunneling Protocol) =  115 ;
    const  DDX (D-II Data Exchange (DDX)) =  116 ;
    const  IATP (Interactive Agent Transfer Protocol) =  117 ;
    const  STP (Schedule Transfer Protocol) =  118 ;
    const  SRP (SpectraLink Radio Protocol) =  119 ;
    const  UTI =  120 ;
    const  SMP (Simple Message Protocol) =  121 ;
    const  SM =  122 ;
    const  [[Performance Transparency Protocol|PTP]] (Performance Transparency Protocol) =  123 ;
    const  [[IS-IS|ISIS]] over [[IPv4]] =  124 ;
    const  FIRE =  125 ;
    const  CRTP (Combat Radio Transport Protocol) =  126 ;
    const  CRUDP (Combat Radio User Datagram) =  127 ;
    const  SSCOPMCE =  128 ;
    const  IPLT =  129 ;
    const  SPS (Secure Packet Shield) =  130 ;
    const  PIPE (Private IP Encapsulation within IP) =  131 ;
    const  [[Stream Control Transmission Protocol|SCTP]] (Stream Control Transmission Protocol) =  132 ;
    const  [[Fibre Channel|FC]] (Fibre Channel) =  133 ;
    const  RSVP-E2E-IGNORE =  134 ;
    const  Mobility Header =  135 ;
    const  UDPLite =  136 ;
    const  MPLS-in-IP =  137 ;
    const  manet (MANET Protocols) =  138 ;
    const  HIP ([[Host Identity Protocol]]) =  139 ;
    const  Shim6 (Shim6 Protocol) =  140 ;
    const  WESP (Wrapped Encapsulating Security Payload) =  141 ;
    const  [[ROHC]] (Robust Header Compression) =  142 ;
    const  Nicht belegt =  143–252 ;
    const  Wird für Experimente und Tests verwendet =  253–254 ;
    const  Reserviert =  255 ;
*/

    public static function humanize($protocol) {
        switch($protocol) {
            case static::TCP :
                return 'TCP'; 

            case static::UDP :
                return 'UDP';

            default:
                return 'Unknown (' . $protocol . ')';
                break;
/*
    const HOPOPT        = 0;

    const ICMP          = 1;
    
    const IGMP          = 2;

    const  GGP          = 3;

    const  IP           = 4;

    const  Stream       = 5;

    const  TCP          = 6;
    
    const  CBT          = 7;

    const  EGP          = 8;

    const  IGP          = 9;

    const  BBN_RCC_MON  = 10;

    const  NVP_II       = 11;

    const  PUP          = 12;

    const  ARGUS        = 13;

    const  EMCON        = 14;

    const  XNET         = 15;

    const  CHAOS        = 16;
*/
        }
    }
}
